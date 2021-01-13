@extends('layouts.admin')

@section('content')
<!-- Page title & actions -->
<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Create task
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <a href="{{ route('comments.index') }}"
            class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            List
        </a>
    </div>
</div>
<form method="POST" action="{{ route('comments.store') }}">
    @csrf

    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 m-3">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Comment Information</h3>
                <p class="mt-1 text-sm text-gray-500">
                    You can add comment in the name of a user for a post. Don't abuse of this power!
                </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-6">
                        <label for="text" class="block text-sm font-medium text-gray-700">Text</label>
                        <div class="mt-1">
                            <textarea id="text" name="text" rows="5"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('text')  border-red-500 @enderror"
                                placeholder="I love it. Maybe if I had more time, I would improve it a lot!">{{old('text')}}</textarea>
                            @error('text')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Made by</label>
                        <select
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('user_id')  border-red-500 @enderror"
                            name="user_id" id="user_id">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if(old('user_id')==$user->id) selected @endif
                                >{{ $user->first_name }} {{ $user->last_name }} - {{ $user->username }}</option>
                            @endforeach
                            @if(!old('user_id') && !isset($comment))
                            <option value="" disabled selected>Select a user</option>
                            @endif
                        </select>
                        @error('user_id')
                        <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="task_id" class="block text-sm font-medium text-gray-700">For task</label>
                        <select
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('task_id')  border-red-500 @enderror"
                            name="task_id" id="task_id">
                            @foreach ($tasks as $task)
                            <option value="{{ $task->id }}" @if(old('task_id')==$task->id) selected
                                @endif >{{ $task->name }} - {{ $task->status }}</option>
                            @endforeach
                            @if(!old('task_id') && !isset($comment))
                            <option value="" disabled selected>Select a task</option>
                            @endif
                        </select>
                        @error('task_id')
                        <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-2">
            <a href="{{ route('comments.index') }}" type="button"
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
