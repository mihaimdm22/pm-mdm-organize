@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show My Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.tasks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $task->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $task->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <span class="badge badge-pill badge-{{ $task->badge() }} p-2">{{ $task->status }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Attachment:</strong>
                <a href="/storage/files/{{ $task->attachment }}" download>{{ $task->attachment }}</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project:</strong>
                {{ $task->project->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Updated at:</strong>
                {{ $task->updated_at->diffForHumans() }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Change Status:</strong>
                <form method="POST" action="{{ route('user.tasks.update', ['task' => $task]) }}" class="form-inline" role="form">
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
            </div>
        </div>
    </div>
    <div>
        <hr>
        Comments:
        <div>
            <form method="POST" action="{{ route('user.comments.store', $task) }}" class="form">
                @csrf
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Text</label>
                    <div class="col-sm-10">
                        <textarea
                            class="form-control @error('text') is-invalid @enderror "
                            placeholder="Lorem Ipsum..."
                            name="text"
                            id="text"
                            >{{old('text')}}</textarea>
                        @error('text')
                        <div class="invalid-feedback">{{$errors->first('text')}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>

        <hr>

        @foreach ($task->comments as $comment)
        <p>{{ $comment->id }} - {{ $comment->text }} - {{ $comment->updated_at->diffForHumans() }}</p>
        @endforeach

    </div>
@endsection
