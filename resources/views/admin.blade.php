@extends('layouts.admin')

@section('content')
<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Admin Dashboard
        </h1>
    </div>
</div>
<div class="content p-8 flex-1 flex flex-col justify-between items-stretch">
    <div class="mb-4 text-lg font-bold">
        Current resources
    </div>
    <div class="grid grid-cols-3 gap-x-6">
        <div>
            <div class="relative bg-gray-100 mb-8 p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="font-semibold leading-tight mb-2 text-lg">
                    {{ $users }} Users
                </div>
                <div class="flex justify-end"><a href="{{ route('users.index') }}" class="text-gray-400 hover:text-gray-600">view all</a></div>
            </div>
        </div>
        <div>
            <div class="relative bg-gray-100 mb-8 p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="font-semibold leading-tight mb-2 text-lg">
                    {{ $roles }} Roles
                </div>
                <div class="flex justify-end"><a href="{{ route('roles.index') }}" class="text-gray-400 hover:text-gray-600">view all</a></div>
            </div>
        </div>
        <div>
            <div class="relative bg-gray-100 mb-8 p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="font-semibold leading-tight mb-8 text-lg">
                    {{ $permissions }} Permissions
                </div>
            </div>
        </div>
        <div>
            <div class="relative bg-gray-100 mb-8 p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="font-semibold leading-tight mb-2 text-lg">
                    {{ $projects }} Projects
                </div>
                <div class="flex justify-end"><a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-gray-600">view all</a></div>
            </div>
        </div>
        <div>
            <div class="relative bg-gray-100 mb-8 p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="font-semibold leading-tight mb-2 text-lg">
                    {{ $tasks }} Tasks
                </div>
                <div class="flex justify-end"><a href="{{ route('tasks.index') }}" class="text-gray-400 hover:text-gray-600">view all</a></div>
            </div>
        </div>
        <div>
            <div class="relative bg-gray-100 mb-8 p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="font-semibold leading-tight mb-2 text-lg">
                    {{ $comments }} Comments
                </div>
                <div class="flex justify-end"><a href="{{ route('comments.index') }}" class="text-gray-400 hover:text-gray-600">view all</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
