<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'MDM-Organizer') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <h1><i class="fas fa-heart fa-fw"></i>Laravel 8 with Bootstrap 4 and FontAwesome 5 Test</h1>

    @auth
        Hi, {{ Auth::user()->username }} !
    @else
        Hi guest!
    @endauth
</body>

</html>
