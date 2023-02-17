<?php

use App\Events\ExamenEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('Dashboard.index');
// });

Route::resource('/projects', ProjectController::class);
Route::resource('/tasks', TaskController::class);
Route::resource('/', DashboardController::class);
Route::resource('/settings', SettingsController::class);

