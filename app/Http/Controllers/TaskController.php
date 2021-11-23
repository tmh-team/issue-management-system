<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskDeveloper;
use App\Models\TaskReviewer;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

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
            'tasks' => Task::where('project_id', $project->id)->orderBy('id', 'desc')->paginate(15),
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
            'statuses' => TaskStatus::where('project_id', $project->id)->get(),
            'users' => $project->users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $request->merge([
            'project_id' => $project->id,
        ]);
        $task = Task::create($request->all());

        foreach ($request['developer_ids'] as $id) {
            TaskDeveloper::create([
                'task_id' => $task->id,
                'user_id' => $id,
            ]);
        }

        foreach ($request['reviewer_ids'] as $id) {
            TaskReviewer::create([
                'task_id' => $task->id,
                'user_id' => $id,
            ]);
        }

        return redirect()->route('tasks.index', $project->id);
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
            'users' => $project->users,
            'developers' => $task->developers->pluck('user_id')->toArray(),
            'reviewers' => $task->reviewers->pluck('user_id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Task $task)
    {
        $request->merge([
            'project_id' => $project->id,
        ]);
        $task->update($request->all());

        TaskDeveloper::where('task_id', $task->id)->delete();
        foreach ($request['developer_ids'] as $id) {
            TaskDeveloper::create([
                'task_id' => $task->id,
                'user_id' => $id,
            ]);
        }

        TaskReviewer::where('task_id', $task->id)->delete();
        foreach ($request['reviewer_ids'] as $id) {
            TaskReviewer::create([
                'task_id' => $task->id,
                'user_id' => $id,
            ]);
        }

        return redirect()->route('tasks.index', $project->id);
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
        Task::findOrFail($task->id)->delete();

        return redirect()->route('tasks.index', $project->id);
    }
}
