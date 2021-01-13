@extends('layouts.app')

@section('content')
<h1><i class="fas fa-heart fa-fw"></i>Laravel 8 with Bootstrap 4 and FontAwesome 5 Test</h1>

@auth
<h2>Hi, {{ Auth::user()->username }} !</h2>
@else
<h2>Hi guest!</h2>
@endauth

<div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
    <div class="flex-shrink-0">
        <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo">
    </div>
    <div>
        <div class="text-xl font-medium text-black">ChitChat</div>
        <p class="text-gray-500">You have a new message!</p>
    </div>
</div>

@endsection
