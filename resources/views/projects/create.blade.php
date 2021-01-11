@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror "
                    placeholder="Apple ML"
                    name="name"
                    value="{{old('name')}}" />
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
                    >{{old('description')}}</textarea>
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
                    value="{{old('start_date')}}" />
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
                    value="{{old('duration')}}" />
                @error('duration')
                <div class="invalid-feedback">{{$errors->first('duration')}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>


    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p> --}}
@endsection
