<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <main>
        <div id="parchment"></div>
        <div id="contain">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <img src="{{ asset('img/ww-logo.png') }}" alt="Wizard Wear Logo" class="oom-header" />
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('img/oom-logo.png') }}" alt="OrderOfMerlin Logo" class="oom-header" />
                    </div>
                    <div class="col-12 text-center">
                        <h1 class="inkTitle">WizardWear - Order of Merlin</h1>
                    </div>
                </div>
            </div>

            @include('oom.layouts._nav')

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
