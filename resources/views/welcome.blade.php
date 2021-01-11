@extends('layouts.app')

@section('content')
<h1><i class="fas fa-heart fa-fw"></i>Laravel 8 with Bootstrap 4 and FontAwesome 5 Test</h1>

@auth
<h2>Hi, {{ Auth::user()->username }} !</h2>
@else
<h2>Hi guest!</h2>
@endauth

@endsection
