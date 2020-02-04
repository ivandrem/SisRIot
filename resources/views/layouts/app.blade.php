<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
    <title>
        @yield('title', config('app.name', 'Laravel'))
    </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-better-nav/css/bootstrap-better-nav.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome/css/fontawesome.min.css') }}">
    @stack('links')
</head>
<body>
    <div id="app">
        @include('layouts.includes.navbar')
        <main class="@yield('mainTagClass', 'container pt-4 pb-5 mb-5')">
            @yield('content')
        </main>
        @section('footer')
            @include('layouts.includes.footer')
        @show
        @yield('modals')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-better-nav/js/bootstrap-better-nav.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
