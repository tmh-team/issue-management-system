<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('about', 'about')->name('about')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}/issues/export', [IssueController::class, 'export'])->name('issues.export');
    Route::resource('projects/{project}/issues', IssueController::class);
    Route::resource('users', UserController::class);
});
