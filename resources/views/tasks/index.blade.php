@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tasks</h2>
        </div>
        <div class="pull-right">
            {{-- @can('task-create') --}}
            <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            {{-- @endcan --}}
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Attachment</th>
        <th>Assigned To</th>
        <th>Project</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->name }}</td>
        <td>{{ \Illuminate\Support\Str::limit( $task->description, 25 ) }}</td>
        <td><span class="badge badge-pill badge-{{ $task->badge() }} p-2">{{ $task->status }}</span></td>
        <td><a href="/storage/files/{{ $task->attachment }}" download>Download File</a></td>
        <td><a href="{{ route('users.show', $task->assigned_to) }}">{{ $task->user->username }}</a></td>
        <td><a href="{{ route('projects.show', $task->project_id) }}">{{ $task->project->name }}</a></td>
        <td>
            <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>
            {{-- @can('task-edit') --}}
            <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
            {{-- @endcan --}}
            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                {{-- @can('task-delete') --}}
                <button type="submit" class="btn btn-danger">Delete</button>
                {{-- @endcan --}}
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $tasks->links() !!}
@endsection
