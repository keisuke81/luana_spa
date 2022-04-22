<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Vue Laravel SPA') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Styles -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
</head>

<body>
  <div id="app">
    <p class="hidden">{{$user_id}}</p>
    <header-component :user_id=@json($user_id)></header-component>
    <router-view :user_id=@json($user_id)></router-view>
  </div>
  <!-- Scripts -->
  <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>

<style>
  body {
    overflow: auto;
  }

  .hidden {
    display: none;
  }
</style>