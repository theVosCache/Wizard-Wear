<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'WizardWear')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/dee40be14a.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="app">
    <main>
        <div id="parchment"></div>
        <div id="contain">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <img src="{{ asset('img/ww-logo.png') }}" alt="Wizard Wear Logo" class="oom-header mx-auto" />
                    </div>
                    <div class="col-12 text-center">
                        <h1 class="inkTitle">WizardWear</h1>
                    </div>
                </div>
            </div>

            @include('layouts._toast')
            @include('layouts._nav')

            @yield('content')
        </div>
    </main>

    <div class="d-none">
        <svg>
            <filter id="wavy2">
                <feTurbulence x="0" y="0" baseFrequency="0.02" numOctaves="5" seed="1" />
                <feDisplacementMap in="SourceGraphic" scale="20" />
            </filter>
        </svg>
    </div>
</div>
</body>
</html>
