@extends('layouts.admin')

@section('content')
<!-- Page title & actions -->
<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            @if(isset($user))
            Edit User
            @else
            Create User
            @endif
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <a href="{{ route('users.index') }}"
            class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            List
        </a>
    </div>
</div>

@if(isset($user))
<form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
    @else
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @endif
        @csrf
        @if(isset($user))
        @method('PUT')
        @endif

        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 m-3">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use a permanent email address which you can access for further communication.
                    </p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                                placeholder="John"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('first_name')  border-red-500 @enderror"
                                value="@if(old('first_name')){{ old('first_name') }}@elseif(isset($user)){{ old('first_name', $user->first_name) }}@endif">
                            @error('first_name')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" name="last_name" id="last_name" autocomplete="last-name"
                                placeholder="Doe"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('last_name')  border-red-500 @enderror"
                                value="@if(old('last_name')){{ old('last_name') }}@elseif(isset($user)){{ old('last_name', $user->last_name) }}@endif">
                            @error('last_name')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email
                                address</label>
                            <input type="email" name="email" id="email" autocomplete="email" placeholder="john@doe.com""
                            class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                                sm:text-sm border-gray-300 rounded-md @error('email') border-red-500 @enderror"
                                value="@if(old('email')){{ old('email') }}@elseif(isset($user)){{ old('email', $user->email) }}@endif">
                            @error('email')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username" autocomplete="username"
                                placeholder="johndoe"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('username')  border-red-500 @enderror"
                                value="@if(old('username')){{ old('username') }}@elseif(isset($user)){{ old('username', $user->username) }}@endif">
                            @error('username')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" autocomplete="password"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('password')  border-red-500 @enderror"
                                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                            @error('password')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                                Password</label>
                            <input type="password" name="confirm-password" id="confirm-password"
                                autocomplete="confirm-password"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('confirm-password')  border-red-500 @enderror"
                                placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                            @error('confirm-password')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">
                                Avatar
                            </label>
                            <div
                                class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="avatar"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload an image</span>
                                            <input id="avatar" name="avatar" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 50MB
                                    </p>
                                    @error('avatar')
                                    <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                            <select id="roles" name="roles[]" autocomplete="roles"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('roles')  border-red-500 @enderror"
                                multiple>
                                @foreach ($roles as $role)
                                <option value="{{$role}}" @if(isset($user) && !empty($userRole) && in_array($role,
                                    $userRole)) selected @endif>
                                    {{$role}}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <div class="text-sm font-medium text-red-500">{{$errors->first('roles')}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('users.index') }}" type="button"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>

    @endsection
