<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('app_name') }}</title>

    <link rel="shortcut icon" href="{{ url('favicon.png') }}"/>
    <link rel="stylesheet" href="{{ mix('/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @stack('css')

</head>
<body class="sidebar-lg">
    <div id="app">
        @include('partials.sidebar')
        <div id="content" class="scroller">
            @include('partials.header')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @yield('quick-sidebar')
    </div>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('js')
    @include('partials.toast')
</body>
</html>

<div class="modal" id="loading">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
