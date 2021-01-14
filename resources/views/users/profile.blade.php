@extends('layouts.custom')

@section('content')
<div class="relative pt-6 pb-2 sm:pb-2">
    @include('includes.navbar')
    <div class="border-b border-gray-200 px-40 py-4 sm:flex sm:items-center sm:justify-between sm:px-20 lg:px-40">
        <section aria-labelledby="activity-title"
            class="mt-4 xl:mt-4 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="bg-white">
                <div class="divide-y divide-gray-200">
                    <div class="pb-4">

                        <div class="flex flex-col m-3">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                            <div class="px-4 py-5 sm:px-6 flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="{{ Storage::url($user->avatar)}}"
                                                        alt="user-avatar">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-lg leading-6 font-medium text-gray-900">
                                                        User Information
                                                    </div>
                                                    <div class="mt-1 max-w-2xl text-sm text-gray-500">
                                                        Personal details and image.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-t border-gray-200">
                                                <dl>
                                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">
                                                            Full name
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            {{ $user->first_name }} {{ $user->last_name }}
                                                        </dd>
                                                    </div>
                                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">
                                                            Username
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            {{ $user->username }}
                                                        </dd>
                                                    </div>
                                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">
                                                            Email address
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            {{ $user->email }}
                                                        </dd>
                                                    </div>
                                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">
                                                            Updated
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            {{ $user->updated_at->diffForHumans() }}
                                                        </dd>
                                                    </div>
                                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">
                                                            Created
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            {{ $user->created_at->diffForHumans() }}
                                                        </dd>
                                                    </div>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
