@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror "
                    placeholder="Improve Design"
                    name="name"
                    id="name"
                    value="{{old('name', $task->name)}}" />
                @error('name')
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea
                    class="form-control @error('description') is-invalid @enderror "
                    placeholder="Lorem Ipsum..."
                    name="description"
                    id="description"
                    >{{old('description', $task->description)}}</textarea>
                @error('description')
                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select
                    class="form-control @error('status') is-invalid @enderror "
                    name="status"
                    id="status">
                    @foreach ($statuses as $status)
                    <option value="{{ $status }}" @if(old('status', $task->status) == $status) selected @endif >{{ $status }}</option>
                    @endforeach
                </select>
                @error('status')
                <div class="invalid-feedback">{{$errors->first('status')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="attachment" class="col-sm-2 col-form-label">Attachment</label>
            <div class="col-sm-10">
                <input
                    type="file"
                    class="form-control-file @error('attachment') is-invalid @enderror "
                    name="attachment"
                    id="attachment"
                    value="{{old('attachment', $task->attachment)}}" />
                @error('attachment')
                <div class="invalid-feedback">{{$errors->first('attachment')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="assigned_to" class="col-sm-2 col-form-label">Assign To</label>
            <div class="col-sm-10">
                <select
                    class="form-control @error('assigned_to') is-invalid @enderror "
                    name="assigned_to"
                    id="assigned_to">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if(old('assigned_to', $task->assigned_to) == $user->id) selected @endif >{{ $user->first_name }} {{ $user->last_name }} - {{ $user->username }}</option>
                    @endforeach
                </select>
                @error('assigned_to')
                <div class="invalid-feedback">{{$errors->first('assigned_to')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="project_id" class="col-sm-2 col-form-label">Project</label>
            <div class="col-sm-10">
                <select
                    class="form-control @error('project_id') is-invalid @enderror "
                    name="project_id"
                    id="project_id">
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}" @if(old('project_id', $task->project_id) == $project->id) selected @endif >{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id')
                <div class="invalid-feedback">{{$errors->first('project_id')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
