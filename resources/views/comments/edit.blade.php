@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Task</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('comments.index') }}"> Back</a>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('comments.update', ['comment' => $comment]) }}">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="text" class="col-sm-2 col-form-label">Text</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('text') is-invalid @enderror " placeholder="Lorem Ipsum..." name="text"
                id="text">{{old('text', $comment->text)}}</textarea>
            @error('text')
            <div class="invalid-feedback">{{$errors->first('text')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="user_id" class="col-sm-2 col-form-label">User</label>
        <div class="col-sm-10">
            <select class="form-control @error('user_id') is-invalid @enderror " name="user_id" id="user_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}" @if(old('user_id', $comment->user_id) == $user->id) selected @endif
                    >{{ $user->first_name }} {{ $user->last_name }} - {{ $user->username }}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{$errors->first('user_id')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="task_id" class="col-sm-2 col-form-label">Task</label>
        <div class="col-sm-10">
            <select class="form-control @error('task_id') is-invalid @enderror " name="task_id" id="task_id">
                @foreach ($tasks as $task)
                <option value="{{ $task->id }}" @if(old('task_id', $comment->task_id) == $task->id) selected @endif
                    >{{ $task->name }} - {{ $task->status }}</option>
                @endforeach
            </select>
            @error('task_id')
            <div class="invalid-feedback">{{$errors->first('task_id')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
