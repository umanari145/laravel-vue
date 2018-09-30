<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('styleSheet')
        @yield('JS')
    </head>
    <body>
        @yield('content')
    </body>

</html>
