<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskDeveloperController;
use App\Http\Controllers\TaskReviewerController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::view('/', 'welcome');

Route::get('language/{locale}', LocalizationController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('about', 'about')->name('about')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}/tasks/export', [TaskController::class, 'export'])->name('tasks.export');
    Route::resource('projects/{project}/tasks', TaskController::class);
    Route::resource('projects/{project}/statuses', TaskStatusController::class)->except('show');
    Route::resource('projects/{project}/categories', TaskCategoryController::class)->except('show');
    Route::resource('projects/{project}/tasks/{task}/developers', TaskDeveloperController::class);
    Route::resource('projects/{project}/tasks/{task}/reviewers', TaskReviewerController::class);
    Route::resource('users', UserController::class);
    Route::resource('profile', ProfileController::class)->except('create', 'store', 'show', 'destroy');
});
