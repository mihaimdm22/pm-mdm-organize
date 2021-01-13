<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('updated_at', 'DESC')->paginate(5);
        return view('tasks.index', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = ['to_do', 'in_progress', 'done'];
        $users = User::all();
        $projects = Project::all();

        return view('tasks.create-edit', compact('statuses','users', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'attachment' => 'nullable|mimes:txt,jpeg,png,jpg,zip,pdf|max:2048',
            'assigned_to' => 'required',
            'project_id' => 'required'
        ]);

        $input = $request->all();

        if ($request->hasFile('attachment')) {
            $filepath = $request->file('attachment')->store('attachments');
            if ($filepath) {
                $input['attachment'] = $filepath;
            }
        }

        Task::create($input);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $statuses = ['to_do', 'in_progress', 'done'];
        $users = User::all();
        $projects = Project::all();

        return view('tasks.create-edit', compact('task', 'statuses','users', 'projects'));
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'attachment' => 'nullable|mimes:txt,jpeg,png,jpg,zip,pdf|max:50048',
            'assigned_to' => 'required',
            'project_id' => 'required'
        ]);

        $input = $request->all();

        if ($request->hasFile('attachment')) {
            $filepath = $request->file('attachment')->store('attachments');
            if ($filepath) {
                $input['attachment'] = $filepath;
            }
        }

        $task->update($input);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }


}
