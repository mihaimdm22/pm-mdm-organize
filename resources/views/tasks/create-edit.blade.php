{{-- @extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
</div>
</div>
</div>

<form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('name') is-invalid @enderror " placeholder="Improve Design"
                name="name" id="name" value="{{old('name', $task->name)}}" />
            @error('name')
            <div class="invalid-feedback">{{$errors->first('name')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('description') is-invalid @enderror " placeholder="Lorem Ipsum..."
                name="description" id="description">{{old('description', $task->description)}}</textarea>
            @error('description')
            <div class="invalid-feedback">{{$errors->first('description')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select class="form-control @error('status') is-invalid @enderror " name="status" id="status">
                @foreach ($statuses as $status)
                <option value="{{ $status }}" @if(old('status', $task->status) == $status) selected @endif
                    >{{ $status }}</option>
                @endforeach
            </select>
            @error('status')
            <div class="invalid-feedback">{{$errors->first('status')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="attachment" class="col-sm-2 col-form-label">Attachment</label>
        <div class="col-sm-10">
            <input type="file" class="form-control-file @error('attachment') is-invalid @enderror " name="attachment"
                id="attachment" value="{{old('attachment', $task->attachment)}}" />
            @error('attachment')
            <div class="invalid-feedback">{{$errors->first('attachment')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="assigned_to" class="col-sm-2 col-form-label">Assign To</label>
        <div class="col-sm-10">
            <select class="form-control @error('assigned_to') is-invalid @enderror " name="assigned_to"
                id="assigned_to">
                @foreach ($users as $user)
                <option value="{{ $user->id }}" @if(old('assigned_to', $task->assigned_to) == $user->id) selected @endif
                    >{{ $user->first_name }} {{ $user->last_name }} - {{ $user->username }}</option>
                @endforeach
            </select>
            @error('assigned_to')
            <div class="invalid-feedback">{{$errors->first('assigned_to')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="project_id" class="col-sm-2 col-form-label">Project</label>
        <div class="col-sm-10">
            <select class="form-control @error('project_id') is-invalid @enderror " name="project_id" id="project_id">
                @foreach ($projects as $project)
                <option value="{{ $project->id }}" @if(old('project_id', $task->project_id) == $project->id) selected
                    @endif >{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id')
            <div class="invalid-feedback">{{$errors->first('project_id')}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection --}}


@extends('layouts.admin')

@section('content')
<!-- Page title & actions -->
<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            @if(isset($task))
            Edit task
            @else
            Create task
            @endif
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <a href="{{ route('tasks.index') }}"
            class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            List
        </a>
    </div>
</div>

@if(isset($task))
<form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}" enctype="multipart/form-data">
    @else
    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @endif
        @csrf
        @if(isset($task))
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
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" placeholder="Change Styling"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name')  border-red-500 @enderror"
                                value="@if(old('name')){{ old('name') }}@elseif(isset($task)){{ old('name', $task->name) }}@endif">
                            @error('name')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="5"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description')  border-red-500 @enderror"
                                    placeholder="Lorem Ipsum...">@if(old('description')){{ old('description') }}@elseif(isset($task)){{ old('description', $task->description) }}@endif</textarea>
                                @error('description')
                                <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for your task.
                            </p>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="col-sm-10">
                                <select
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('status')  border-red-500 @enderror"
                                    name="status" id="status">
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status }}" @if(old('status')==$status) selected
                                        @elseif(isset($task) && $task->status == $status) selected @endif>{{ $status }}
                                    </option>
                                    @endforeach
                                    @if(!old('status') && !isset($task))
                                    <option value="" disabled selected>Select a status</option>
                                    @endif
                                </select>
                                @error('status')
                                <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="assigned_to" class="block text-sm font-medium text-gray-700">Assigned To</label>
                            <select
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('assigned_to')  border-red-500 @enderror"
                                name="assigned_to" id="assigned_to">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if(old('assigned_to')==$user->id) selected
                                    @elseif(isset($task) && $task->assigned_to == $user->id)
                                    selected @endif
                                    >{{ $user->first_name }} {{ $user->last_name }} - {{ $user->username }}</option>
                                @endforeach
                                @if(!old('assigned_to') && !isset($task))
                                    <option value="" disabled selected>Select a user</option>
                                @endif
                            </select>
                            @error('assigned_to')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="project_id" class="block text-sm font-medium text-gray-700">For Project</label>
                            <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('project_id')  border-red-500 @enderror" name="project_id" id="project_id">
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if(old('project_id')==$project->id) selected
                                    @elseif(isset($task) && $task->project_id == $user->id)
                                    selected @endif >{{ $project->name }}</option>
                                @endforeach
                                @if(!old('project_id') && !isset($task))
                                    <option value="" disabled selected>Select a project</option>
                                @endif
                            </select>
                            @error('project_id')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">
                                Attachment
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
                                        <label for="attachment"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload an attachment</span>
                                            <input id="attachment" name="attachment" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        TXT, JPEG, PNG, JPG, ZIP or PDF up to 50MB
                                    </p>
                                    @error('attachment')
                                    <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-2">
                <a href="{{ route('tasks.index') }}" type="button"
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
