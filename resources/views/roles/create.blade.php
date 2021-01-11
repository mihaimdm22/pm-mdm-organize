@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror "
                placeholder="Admin"
                name="name"
                id="name"
                value="{{old('name')}}" />
            @error('name')
            <div class="invalid-feedback">{{$errors->first('name')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="permissions" class="col-sm-2 col-form-label">Permissions</label>
        <div id="permissions" class="col-sm-10">
            @foreach($permission as $value)
            <div class="form-group form-check">
                <input
                    type="checkbox"
                    name="permission[]"
                    class="form-check-input name"
                    id="perm-{{ $value->id }}"
                    value="{{ $value->id }}">
                <label for="perm-{{ $value->id }}" class="form-check-label">{{ $value->name }}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
@endsection
