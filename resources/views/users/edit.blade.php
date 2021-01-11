@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control @error('first_name') is-invalid @enderror "
                placeholder="John"
                name="first_name"
                id="first_name"
                value="{{old('first_name', $user->first_name)}}" />
            @error('first_name')
            <div class="invalid-feedback">{{$errors->first('first_name')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control @error('last_name') is-invalid @enderror "
                placeholder="Doe"
                name="last_name"
                id="last_name"
                value="{{old('last_name', $user->last_name)}}" />
            @error('last_name')
            <div class="invalid-feedback">{{$errors->first('last_name')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control @error('username') is-invalid @enderror "
                placeholder="johndoe"
                name="username"
                id="username"
                value="{{old('username', $user->username)}}" />
            @error('username')
                <div class="invalid-feedback">{{$errors->first('username')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror "
                placeholder="john@example.com"
                name="email"
                id="email"
                value="{{old('email', $user->email)}}" />
            @error('email')
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror "
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                name="password"
                id="password"
                value="" />
            @error('password')
            <div class="invalid-feedback">{{$errors->first('password')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
            <input
                type="password"
                class="form-control @error('confirm-password') is-invalid @enderror "
                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                name="confirm-password"
                id="confirm-password"
                value="" />
            @error('confirm-password')
            <div class="invalid-feedback">{{$errors->first('confirm-password')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="roles" class="col-sm-2 col-form-label">Roles</label>
        <div class="col-sm-10">
            <select
                class="form-control @error('roles') is-invalid @enderror "
                name="roles[]"
                id="roles"
                multiple>
                @foreach ($roles as $role)
                <option @if(!empty($userRole) && in_array($role, $userRole)) selected @endif >{{$role}}</option>
                @endforeach
            </select>
            @error('roles')
            <div class="invalid-feedback">{{$errors->first('roles')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
