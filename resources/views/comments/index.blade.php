@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Comments</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('comments.create') }}"> Create New Comment</a>
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
        <th>Text</th>
        <th>User</th>
        <th>Task</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($comments as $comment)
    <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ \Illuminate\Support\Str::limit( $comment->text, 25 ) }}</td>
        <td><a href="{{ route('users.show', $comment->user_id) }}">{{ $comment->user->username }}</a></td>
        <td><a href="{{ route('tasks.show', $comment->task_id) }}">{{ $comment->task->name }}</a></td>
        <td>
            <a class="btn btn-info" href="{{ route('comments.show',$comment->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('comments.edit',$comment->id) }}">Edit</a>
            <form action="{{ route('comments.destroy',$comment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $comments->links() !!}
@endsection
