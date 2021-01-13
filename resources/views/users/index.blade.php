@extends('layouts.admin')

@section('content')
<!-- Page title & actions -->
<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Manage Users
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <a href="{{ route('users.create') }}"
            class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            Create
        </a>
    </div>
</div>

<div class="flex flex-col m-3">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="min-w-full p-4">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="filters-label flex-1 min-w-0">
                            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Filter</h2>
                        </div>
                        <div class="sorts-label mt-4 flex sm:mt-0 sm:ml-4">
                            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Sort</h2>
                        </div>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="filters flex-1 min-w-0">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                <a href="{{ route('users.index', ['role' => 'admin', 'sort_by' => request('sort_by'), 'sort' => request('sort')]) }}"
                                    class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Admin
                                </a>
                                <a href="{{ route('users.index', ['role' => 'user', 'sort_by' => request('sort_by'), 'sort' => request('sort')]) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    User
                                </a>
                                <a href="{{ route('users.index', ['role' => ['admin','user'], 'sort_by' => request('sort_by'), 'sort' => request('sort')]) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Admin and User
                                </a>
                                <a href="{{ route('users.index', ['sort_by' => request('sort_by'), 'sort' => request('sort')]) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-400 bg-white text-sm font-medium text-gray-800 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Reset filter
                                </a>
                            </span>
                        </div>

                        <div class="sorts mt-4 flex sm:mt-0 sm:ml-4">
                            <span class="relative z-0 inline-flex shadow-sm rounded-md mt-2">
                                <a href="{{ route('users.index', ['role' => request('role'), 'sort_by' => 'first_name', 'sort' => request('sort')]) }}"
                                    class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    First Name
                                </a>
                                <a href="{{ route('users.index', ['role' => request('role'), 'sort_by' => 'email', 'sort' => request('sort')]) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Email
                                </a>
                                <a href="{{ route('users.index', ['role' => request('role'), 'sort_by' => 'updated_at', 'sort' => request('sort')]) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Updated
                                </a>
                                <a href="{{ route('users.index', ['role' => request('role'), 'sort_by' => request('sort_by'), 'sort' => 'asc']) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Asc
                                </a>
                                <a href="{{ route('users.index', ['role' => request('role'), 'sort_by' => request('sort_by'), 'sort' => 'desc']) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Desc
                                </a>
                                <a href="{{ route('users.index', ['role' => request('role')]) }}"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-400 bg-white text-sm font-medium text-gray-800 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    Reset sort
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Projects table (small breakpoint and up) -->
<div class="flex flex-col m-3">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $user->id }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ Storage::url($user->avatar)}}"
                                            alt="avatar">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ '@' . $user->username }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @forelse($user->getRoleNames() as $v)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $v }}</span>
                                @empty
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-grey-300 text-grey-800">No
                                    roles assigned</span>
                                @endforelse
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->updated_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-6 md:order-2">
                                    <a href="{{ route('users.show',$user->id) }}"
                                        class="text-green-600 hover:text-green-900">
                                        <span class="sr-only">View</span>
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('users.edit',$user->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <span class="sr-only">Edit</span>
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form class="inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900" type="submit" title="delete">
                                            <span class="sr-only">Edit</span>
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap" colspan="100%">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    No users found!
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if(!request()->has('role') && $users->hasPages())
<div class="flex flex-col m-3">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="min-w-full divide-y divide-gray-200 p-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
