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
                <div class="min-w-full divide-y divide-gray-200 p-4">
                    <div>
                        <div class="filters">
                            Filter role:
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
                                'role' => 'admin',
                                'sort_by' => request('sort_by'),
                                'sort' => request('sort')
                                ]) }}">Admin</a>
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
                                'role' => 'user',
                                'sort_by' => request('sort_by'),
                                'sort' => request('sort')
                                ]) }}">User</a>
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'role' => ['admin','user'],
            'sort_by' => request('sort_by'),
            'sort' => request('sort')
            ]) }}">Both</a>

                            <br>

                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'sort_by' => request('sort_by'),
            'sort' => request('sort')
            ]) }}">Reset filter</a>
                        </div>

                        <div class="sorts">
                            Sort by first name:
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'role' => request('role'),
            'sort_by' => 'first_name',
            'sort' => 'asc'
            ]) }}">Asc</a>
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'role' => request('role'),
            'sort_by' => 'first_name',
            'sort' => 'desc'
            ]) }}">Desc</a>

                            <br>

                            Sort by email:
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'role' => request('role'),
            'sort_by' => 'email',
            'sort' => 'asc'
            ]) }}">Asc</a>
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'role' => request('role'),
            'sort_by' => 'email',
            'sort' => 'desc'
            ]) }}">Desc</a>

                            <br>

                            <a class="btn btn-sm btn-outline-dark" href="{{ route('users.index', [
            'role' => request('role')
            ]) }}">Reset sort</a>

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

                        @forelse ($users as $key => $user)
                        <tr>
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
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-grey-300 text-grey-800">No roles assigned</span>
                                @endforelse
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->updated_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('users.show',$user->id) }}"
                                    class="text-green-600 hover:text-green-900">View</a>
                                <a href="{{ route('users.edit',$user->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form class="inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-900" type="submit" title="delete">
                                        Delete
                                    </button>
                                </form>
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
