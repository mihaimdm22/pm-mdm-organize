@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>My Tasks</h2>
        </div>
        <div class="pull-right">
            {{-- <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a> --}}
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

{{-- <div class="row">
    @foreach ($tasks as $task)
    <div class="col-4 p-2">
    <div class="card border-{{ $task->badge() }}">
        <div class="card-header">
            <h5 class="card-title">{{ $task->id }} - {{ $task->name }}</h5>
        </div>
        <div class="card-body">

          <h6 class="card-subtitle mb-2 text-muted">{{ $task->project->name }}</h6>
          <p class="card-text">{{ $task->description }}</p>
          <div class="btn-group mb-1">
            <button type="button" class="btn btn-{{ $task->badge() }}">{{ Str::upper($task->status) }}</button>
            <button type="button" class="btn btn-{{ $task->badge() }} dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item">To Do</button>
              <div class="dropdown-divider"></div>
              <button class="dropdown-item" href="#">In Progress</button>
              <div class="dropdown-divider"></div>
              <button class="dropdown-item" href="#">Done</button>
              <div class="dropdown-divider"></div>
            </div>
          </div>
          <form method="POST" action="{{ route('my-tasks.update', ['task' => $task]) }}" class="form-inline" role="form">
            @csrf
            @method('PUT')

                    <select
                        class="form-control @error('status') is-invalid @enderror mr-1"
                        name="status"
                        id="status">
                        @foreach ($statuses as $status)
                        <option value="{{ $status }}" @if(old('status', $task->status) == $status) selected @endif >{{ $status }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-dark">Save</button>

          </form>
          <p class="card-text"><small class="text-muted">Last updated {{ $task->updated_at->diffForHumans() }}</small></p>
        </div>
    </div>
</div>
    @endforeach
</div>

<div>
    {!! $tasks->links() !!}
</div> --}}

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Attachment</th>
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
        <td>{{ $task->user->username }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('user.tasks.show',$task->id) }}">Show</a>
        </td>
    </tr>
    @endforeach
</table>

{!! $tasks->links() !!}
@endsection
