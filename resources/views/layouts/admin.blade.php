<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MDM-Organizer') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="h-screen flex overflow-hidden bg-white">

        @include('includes.sidebar')

        <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">

            @include('includes.alert')

            @yield('content')

            @include('includes.footer')

        </main>
    </div>
</body>

</html>
