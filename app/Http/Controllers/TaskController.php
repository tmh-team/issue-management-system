<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskStatus;

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
        return view('tasks.index', [
            'projectId' => $project->id,
            'tasks' => Task::with('status', 'category')
                ->where('project_id', $project->id)
                ->filter()
                ->sort()
                ->paginate(config('contants.pagination_limit')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('tasks.create', [
            'projectId' => $project->id,
            'task' => new Task(),
            'statuses' => TaskStatus::where('project_id', $project->id)->get(),
            'categories' => TaskCategory::where('project_id', $project->id)->get(),
            'users' => $project->users,
            'developers' => collect(),
            'reviewers' => collect(),
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
        return view('tasks.show', [
            'projectId' => $project->id,
            'task' => $task,
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
        return view('tasks.edit', [
            'projectId' => $project->id,
            'task' => $task,
            'statuses' => TaskStatus::where('project_id', $project->id)->get(),
            'categories' => TaskCategory::where('project_id', $project->id)->get(),
            'users' => $project->users,
            'developers' => $task->developers->pluck('id'),
            'reviewers' => $task->reviewers->pluck('id'),
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
}
