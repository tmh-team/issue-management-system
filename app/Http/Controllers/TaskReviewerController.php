<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskReviewer;
use Illuminate\Http\Request;

class TaskReviewerController extends Controller
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
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Projects', 'url' => route('projects.index')],
            ['title' => 'Reviewer Management', 'url' => route('reviewers.index', $project->id)],
        ];

        return view('task_reviewers.index', [
            'projectId' => $project->id,
            'taskId' => $task->id,
            'reviewers' => TaskReviewer::where('task_id', $task->id)->orderBy('id', 'desc')->paginate(15),
            'breadcrumbs' => $breadcrumbs,
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
     * @param  \App\Models\TaskReviewer  $taskReviewer
     * @return \Illuminate\Http\Response
     */
    public function show(TaskReviewer $taskReviewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskReviewer  $taskReviewer
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskReviewer $taskReviewer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskReviewer  $taskReviewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskReviewer $taskReviewer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @param  \App\Models\TaskDeveloper  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Task $task, TaskReviewer $reviewer)
    {
        TaskReviewer::findOrFail($reviewer->id)->delete();

        return redirect()->route('reviewers.index', [$project->id, $task->id]);
    }
}
