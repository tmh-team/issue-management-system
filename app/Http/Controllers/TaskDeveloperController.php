<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskDeveloper;
use Illuminate\Http\Request;

class TaskDeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, Task $task)
    {
        return view('task_developers.index', [
            'projectId' => $project->id,
            'taskId' => $task->id,
            'developers' => TaskDeveloper::where('task_id', $task->id)->orderBy('id', 'desc')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, Task $task)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project, Task $task)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskDeveloper  $taskDeveloper
     * @return \Illuminate\Http\Response
     */
    public function show(TaskDeveloper $taskDeveloper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskDeveloper  $taskDeveloper
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskDeveloper $taskDeveloper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskDeveloper  $taskDeveloper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskDeveloper $taskDeveloper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @param  \App\Models\TaskDeveloper  $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Task $task, TaskDeveloper $developer)
    {
        TaskDeveloper::findOrFail($developer->id)->delete();

        return redirect()->route('developers.index', [$project->id, $task->id]);
    }
}
