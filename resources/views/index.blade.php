<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>サンプルview</title>
  <link href="{{ asset('/catalog/assets/css/app.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app" v-cloak>
    <div >
        <sidenavi></sidenavi><router-view></router-view>
    </div>

</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
