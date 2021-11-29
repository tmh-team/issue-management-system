<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCategoryStoreRequest;
use App\Http\Requests\TaskCategoryUpdateRequest;
use App\Models\Project;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('task_categories.index', [
            'projectId' => $project->id,
            'categories' => TaskCategory::where('project_id', $project->id)->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('task_categories.create', [
            'projectId' => $project->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskCategoryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCategoryStoreRequest $request, Project $project)
    {
        $request->merge([
            'project_id' => $project->id,
        ]);
        TaskCategory::create($request->all());

        return redirect()
            ->route('categories.index', $project->id)
            ->with('success', 'A category has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCategory  $taskCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCategory $taskCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\TaskCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, TaskCategory $category)
    {
        return view('task_categories.edit', [
            'projectId' => $project->id,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskCategoryUpdateRequest  $request
     * @param  \App\Models\Project  $project
     * @param  \App\Models\TaskCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCategoryUpdateRequest $request, Project $project, TaskCategory $category)
    {
        $request->merge([
            'project_id' => $project->id,
        ]);
        $category->update($request->all());

        return redirect()
            ->route('categories.index', $project->id)
            ->with('success', 'A category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\TaskCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, TaskCategory $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index', $project->id)
            ->with('success', 'A category has been deleted.');
    }
}
