<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if (Auth::check())
                    <a class="navbar-brand" href="{{ url('home') }}">
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                @endif
                
                        {{ config('app.name', 'Laravel') }}
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        @include('layouts.navs.adminavbar')
                    @elseif (Auth::user()->role == 'sup')
                        @include('layouts.navs.supnavbar')
                    @elseif (Auth::user()->role == 'user')
                        @include('layouts.navs.usernavbar')
                    
                    @endif
                @else
                    @include('layouts.navs.navbar')
                @endif
            </div>
        </nav>
                        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
