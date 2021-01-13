<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Project;
use App\Models\Task;
use App\Models\Comment;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();
        $roles = Role::all()->count();
        $permissions = Permission::all()->count();
        $projects = Project::all()->count();
        $tasks = Task::all()->count();
        $comments = Comment::all()->count();

        return view('admin', compact('users', 'roles', 'permissions','projects', 'tasks', 'comments'));
    }
}
