<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->paginate(5);
        return view('tasks.user-index', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $statuses = ['to_do', 'in_progress', 'done'];

        return view('tasks.user-show', compact('task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $task->update($request->all());

        return redirect()->route('user.tasks.show', $task)
            ->with('success', 'Task updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $this->validate($request, [
            // 'user_id' => 'required',
            // 'task_id' => 'required',
            'text' => 'required'
        ]);

        Comment::create([
            'text' => $request->text,
            'user_id' => auth()->user()->id,
            'task_id' => $task->id
        ]);

        return redirect()->back()
            ->with('success', 'Comment created successfully');
    }
}
