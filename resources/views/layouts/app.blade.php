<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Roboto:ital,wght@0,500;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Roboto:ital,wght@0,500;0,700;1,300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('baguettebox.js/dist/baguetteBox.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">


        @include('layouts.navigation')

            @include('layouts.alerts')
        <main >
            @yield('content')
        </main>



    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('baguettebox.js/dist/baguetteBox.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>
</body>
</html>
