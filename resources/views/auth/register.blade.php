@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 z-50">
        <div>
            <img class="mx-auto h-20 w-auto" src="{{ Storage::url('images/mdm-organizer_logo.png')}}"
                alt="MDM Organize Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Register
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    go back to login
                </a>
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 m-3">
                <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                    name</label>
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
                                <input type="email" name="email" id="email" autocomplete="email"
                                    placeholder="john@doe.com" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
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
                                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm
                                    Password</label>
                                <input type="password" name="password-confirm" id="password-confirm"
                                    autocomplete="confirm-password"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('password-confirm')  border-red-500 @enderror"
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
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-1 w-full">
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
