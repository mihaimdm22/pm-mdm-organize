{{-- @extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('projects.update', ['project' => $project]) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror "
                    placeholder="Apple ML"
                    name="name"
                    value="{{old('name', $project->name)}}" />
                @error('name')
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea
                    class="form-control @error('description') is-invalid @enderror "
                    placeholder="Lorem Ipsum..."
                    name="description"
                    id="description"
                    >{{old('description', $project->description)}}</textarea>
                @error('description')
                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
            <div class="col-sm-10">
                <input
                    type="date"
                    class="form-control @error('start_date') is-invalid @enderror "
                    placeholder="01.01.2020"
                    name="start_date"
                    value="{{old('start_date', $project->start_date)}}" />
                @error('start_date')
                <div class="invalid-feedback">{{$errors->first('start_date')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="duration" class="col-sm-2 col-form-label">Duration</label>
            <div class="col-sm-10">
                <input
                    type="number"
                    step="0.01"
                    min="1" max="52"
                    class="form-control @error('duration') is-invalid @enderror "
                    placeholder="5,50"
                    name="duration"
                    value="{{old('duration', $project->duration)}}" />
                @error('duration')
                <div class="invalid-feedback">{{$errors->first('duration')}}</div>
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
            @if(isset($project))
            Edit Project
            @else
            Create Project
            @endif
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <a href="{{ route('projects.index') }}"
            class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            List
        </a>
    </div>
</div>

@if(isset($project))
<form method="POST" action="{{ route('projects.update', ['project' => $project]) }}" enctype="multipart/form-data">
@else
<form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
@endif
    @csrf
    @if(isset($project))
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
                        <input type="text" name="name" id="name"
                            placeholder="Apple Inc"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name')  border-red-500 @enderror"
                            value="@if(old('name')){{ old('name') }}@elseif(isset($project)){{ old('name', $project->name) }}@endif">
                        @error('name')
                        <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                          <textarea id="description" name="description" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description')  border-red-500 @enderror" placeholder="Lorem Ipsum...">@if(old('description')){{ old('description') }}@elseif(isset($project)){{ old('description', $project->description) }}@endif</textarea>
                          @error('description')
                            <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                          Brief description for your project.
                        </p>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="start_date" id="start_date"
                            placeholder="01.01.2020"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('start_date')  border-red-500 @enderror"
                            value="@if(old('start_date')){{ old('start_date') }}@elseif(isset($project)){{ old('start_date', $project->start_date) }}@endif">
                        @error('start_date')
                        <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">
                            Must be a date after today.
                          </p>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                        <input type="number" name="duration" id="duration"
                            placeholder="2,50"
                            type="number"
                            step="0.50"
                            min="1" max="52"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('duration')  border-red-500 @enderror"
                            value="@if(old('duration')){{ old('duration') }}@elseif(isset($project)){{ old('duration', $project->duration) }}@endif">
                        @error('duration')
                        <div class="text-sm font-medium text-red-500">{{ $message }}</div>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">
                            Appearing in weeks. Two and half weeks are represented as 2,50.
                          </p>
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
                                    PDF, DOC, DOCX, TXT up to 50MB
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
            <a href="{{ route('projects.index') }}" type="button"
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

