<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WW') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @yield('style')

    @yield('scripts')
</head>
<body>
<div id="app">
    <main>
        <div id="parchment"></div>

        @yield('content')
    </main>

    <div class="d-none">
        <svg>
            <filter id="wavy2">
                <feTurbulence x="0" y="0" baseFrequency="0.02" numOctaves="5" seed="1"/>
                <feDisplacementMap in="SourceGraphic" scale="20"/>
            </filter>
        </svg>
    </div>
</div>
</body>
</html>
