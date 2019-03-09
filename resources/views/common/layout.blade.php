<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"></script>
        @yield('styleSheet')
    </head>
    <body>
        <input type="hidden" id="entry_url" value="{{env('APP_URL')}}">
        @yield('content')
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('JS')
    </body>
</html>
