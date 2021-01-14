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
                        <div>
                            <div>
                                <div
                                    class="md:flex md:items-center md:justify-between md:space-x-4 xl:border-b xl:pb-6">
                                    <div>
                                        <span class="mt-1 text-3xl font-bold text-gray-900">
                                            {{ $task->name }}
                                            <span
                                                class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-{{ $task->badge() }}-100 text-{{ $task->badge() }}-700">{{ $task->status }}</span></span>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Project: {{ $task->project->name }}
                                        </p>
                                    </div>

                                    <div class="mt-4 flex space-x-3 md:mt-0">
                                        @if($task->attachment)
                                        <a href="{{ Storage::url($task->attachment)}}"
                                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <span>Open</span>
                                        </a>
                                        <a href="{{ Storage::url($task->attachment)}}"
                                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                            download>
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <span>Download</span>
                                        </a>
                                        @else
                                        <a href="#"
                                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white">
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                                </path>
                                            </svg>
                                            <span>No attachment available</span>
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="py-3 xl:pt-6 xl:pb-0">
                                    <h2 class="sr-only">Description</h2>
                                    <div class="prose max-w-none">
                                        {{ $task->description }}
                                    </div>
                                </div>

                                <div class="py-10 xl:pt-6 xl:pb-0">
                                    <form method="POST" action="{{ route('user.tasks.update', ['task' => $task]) }}"
                                        role="form">
                                        @csrf
                                        @method('PUT')
                                        <select
                                            class="block focus:ring-gray-500 focus:border-gray-500 shadow-sm sm:text-sm border-gray-300 rounded-md mb-1"
                                            name="status" id="status">
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status }}" @if(old('status', $task->status) == $status)
                                                selected @endif
                                                >{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit"
                                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                            <!-- Heroicon name: pencil -->
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                            <span>Change Status</span>
                                    </form>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-4 pt-10">
                        <h2 id="activity-title" class="text-lg font-medium text-gray-900">Comments</h2>
                    </div>
                    <div class="pt-6">
                        <div class="flow-root">
                            <ul class="-mb-8">
                                @foreach ($task->comments as $comment)
                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                                            aria-hidden="true"></span>
                                        <div class="relative flex items-start space-x-3">
                                            <div class="relative">
                                                <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white"
                                                    src="{{ Storage::url($comment->user->avatar)}}" alt="user-avatar">
                                                <span
                                                    class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                                                    <!-- Heroicon name: chat-alt -->
                                                    <svg class="h-5 w-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div>
                                                    <div class="text-sm">
                                                        <p class="font-medium text-gray-900 inline">
                                                            {{ $comment->user->first_name }}
                                                            {{ $comment->user->last_name }} @if($comment->user->id ==
                                                            $task->user->id) (me) @endif</p>
                                                        <div class="text-sm text-gray-500 inline">
                                                            {{ '@' . $comment->user->username }}
                                                        </div>
                                                    </div>
                                                    <p class="mt-0.5 text-sm text-gray-500">
                                                        Commented {{ $comment->updated_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                                <div class="mt-2 text-sm text-gray-700">
                                                    <p>
                                                        {{ $comment->text }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-6">
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="relative">
                                        <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white"
                                            src="{{ Storage::url($task->user->avatar)}}" alt="logged-in-user-logo">
                                        <span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <form method="POST" action="{{ route('user.comments.store', $task) }}">
                                        @csrf
                                        <div>
                                            <label for="text" class="sr-only">Comment</label>
                                            <textarea id="text" name="text" rows="3"
                                                class="shadow-sm block w-full focus:ring-gray-900 focus:border-gray-900 sm:text-sm border-gray-300 rounded-md @error('text')  border-red-500 @enderror"
                                                placeholder="Leave a comment"></textarea>
                                            @error('text')
                                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mt-6 flex items-center justify-end space-x-4">
                                            <button type="submit"
                                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                                Comment
                                            </button>
                                        </div>
                                    </form>
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
