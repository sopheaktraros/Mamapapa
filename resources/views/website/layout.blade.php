<!doctype html>
<html lang="{{ active_language() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Drsb Express</title>
    <link rel="shortcut icon" href="{{ url('favicon.png') }}"/>
    <link rel="stylesheet" href="{{ mix('/website/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('/website/css/app.css') }}">
    @stack('css')
</head>

<body>
@yield('content')
   
    {{-- <script src="{{ mix('/website/js/vendor.js') }}"></script> --}}
    <script src="{{ mix('/website/js/app.js') }}"></script>
    @stack('web-js')
    @include('partials.toast')
</body>

</html>


