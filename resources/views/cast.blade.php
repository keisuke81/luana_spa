<!doctype html>
<html lang="ja">


<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title></title>

  <!-- Styles -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
</head>

<body>
  <div id="cast">
    <p class="hidden">{{$cast_id}}</p>
    <header-component :cast_id=@json($cast_id)></header-component>
    <router-view :cast_id=@json($cast_id)></router-view>
  </div>
  <!-- Scripts -->
  <script src="{{ mix('/js/cast.app.js') }}" defer></script>
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