<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserTaskController;

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

Route::get('/', function () { return view('welcome');} )->name('home');

Auth::routes();

Route::group([
    'middleware' => ['user']
], function() {
    Route::get('/tasks', [App\Http\Controllers\UserTaskController::class, 'index'])->name('user.tasks.index');
    Route::get('/tasks/{task}', [App\Http\Controllers\UserTaskController::class, 'show'])->name('user.tasks.show');
    Route::put('/tasks/{task}', [App\Http\Controllers\UserTaskController::class, 'update']);
});

Route::group([
    'prefix' => 'admin',
    // 'as' => 'admin.',
    'middleware' => ['admin']
], function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('comments', CommentController::class);
});

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('projects', ProjectController::class);
// });

// Route::get('/admin/dashboard', function(){
//     return 'Wellcome Admin!';
// })->name('admin.dashboard');

// Route::group([
//     // 'prefix' => 'client',
//     // 'as' => 'client',
//     // 'namespace' => 'Client',
//    'middleware' => ['auth']
// ], function() {
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// Route::group([
//     'prefix' => 'admin',
//     // 'as' => 'admin',
//     'namespace' => 'Admin',
//     'middleware' => ['auth', 'admin']
// ], function() {
//     Route::get('/home', function () { return view('welcome'); })->name('home');
// });

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
