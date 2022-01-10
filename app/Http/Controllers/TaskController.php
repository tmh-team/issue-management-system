<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskStatus;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Projects', 'url' => route('projects.index')],
            ['title' => $project->name, 'url' => route('projects.show', $project->id)],
            ['title' => 'Tasks', 'url' => route('tasks.index', $project->id)],
        ];

        $tasks = Task::with('status', 'category')
            ->where('project_id', $project->id)
            ->filter(request(['search', 'filter']))
            ->sort()
            ->paginate(config('contants.pagination_limit'));

        return view('tasks.index', [
            'projectId' => $project->id,
            'tasks' => $tasks,
            'options' => [
                'statuses' => TaskStatus::where('project_id', $project->id)->get(),
                'categories' => TaskCategory::where('project_id', $project->id)->get(),
            ],
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Get all tasks for the specified user.
     *
     * @return void
     */
    public function myTasks()
    {
        [$projectIds, $statuses, $categories] = $this->getMyFilters();

        $tasks = Task::with('status', 'category', 'developers', 'reviewers')
            ->filter(request(['search', 'filter']))
            ->sort()
            ->paginate(config('contants.pagination_limit'));

        return view('tasks.my_tasks', [
            'tasks' => $tasks,
            'options' => [
                'projects' => Project::whereIn('id', $projectIds)->get(),
                'statuses' => $statuses,
                'categories' => $categories,
            ],
        ]);
    }

    /**
     * Get my tasks' filter properties.
     *
     * @return array
     */
    public function getMyFilters()
    {
        $request = request('filter') ?? [];
        if (!array_key_exists('view', $request)) {
            abort('404');
        }

        $tasks = $request['view'] === 'develop'
            ? auth()->user()->developTasks
            : ($request['view'] === 'review' ? auth()->user()->reviewTasks : abort('404'));

        $projectIds = $tasks->unique('project_id')->pluck('project_id');

        $statuses = TaskStatus::with('project')
            ->whereIn('project_id', $projectIds)
            ->get()
            ->groupBy(fn($item) => $item->project_id);

        $categories = TaskCategory::with('project')
            ->whereIn('project_id', $projectIds)
            ->get()
            ->groupBy(fn($item) => $item->project_id);

        return [$projectIds, $statuses, $categories];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Projects', 'url' => route('projects.index')],
            ['title' => $project->name, 'url' => route('projects.show', $project->id)],
            ['title' => 'Tasks', 'url' => route('tasks.index', $project->id)],
            ['title' => 'Create', 'url' => route('tasks.index', $project->id)],
        ];

        return view('tasks.create', [
            'projectId' => $project->id,
            'task' => new Task(),
            'statuses' => TaskStatus::where('project_id', $project->id)->get(),
            'categories' => TaskCategory::where('project_id', $project->id)->get(),
            'users' => $project->users,
            'developers' => collect(),
            'reviewers' => collect(),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskStoreRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request, Project $project)
    {
        $request->merge([
            'project_id' => $project->id,
        ]);
        $task = Task::create($request->all());

        $task->developers()->attach($request->developer_ids);
        $task->reviewers()->attach($request->reviewer_ids);

        return redirect()
            ->route('tasks.index', $project->id)
            ->with('success', 'A task has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Task $task)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Projects', 'url' => route('projects.index')],
            ['title' => $project->name, 'url' => route('projects.show', $project->id)],
            ['title' => 'Tasks', 'url' => route('tasks.index', $project->id)],
            ['title' => 'Task Detail', 'url' => route('tasks.show', [$project->id, $task->id])],
        ];

        return view('tasks.show', [
            'projectId' => $project->id,
            'task' => $task,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Task $task)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Projects', 'url' => route('projects.index')],
            ['title' => $project->name, 'url' => route('projects.show', $project->id)],
            ['title' => 'Tasks', 'url' => route('tasks.index', $project->id)],
            ['title' => 'Edit', 'url' => route('tasks.show', [$project->id, $task->id])],
        ];

        return view('tasks.edit', [
            'projectId' => $project->id,
            'task' => $task,
            'statuses' => TaskStatus::where('project_id', $project->id)->get(),
            'categories' => TaskCategory::where('project_id', $project->id)->get(),
            'users' => $project->users,
            'developers' => $task->developers->pluck('id'),
            'reviewers' => $task->reviewers->pluck('id'),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskUpdateRequest  $request
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, Project $project, Task $task)
    {
        $request->merge([
            'project_id' => $project->id,
        ]);
        $task->update($request->all());

        $task->developers()->sync($request->developer_ids);
        $task->reviewers()->sync($request->reviewer_ids);

        return redirect()
            ->route('tasks.index', $project->id)
            ->with('success', 'A task has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index', $project->id)
            ->with('success', 'A task has been deleted.');
    }

    /**
     * Export tasks info.
     *
     * @return void
     */
    public function export()
    {
        return Excel::download(new TaskExport(), 'Tasks' . '.xlsx');
    }
}
