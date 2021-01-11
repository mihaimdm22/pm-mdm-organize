@extends('layouts.app')

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
@endsection
