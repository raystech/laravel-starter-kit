<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Starter Kit</title>
  <link href="{{ scontent('css/app.css') }}" rel="stylesheet">
  <link href="{{ scontent('css/styles.css') }}" rel="stylesheet">
  <link href="{{ scontent('css/icons/icomoon/styles.css') }}" rel="stylesheet">

  @section('head')
  @show
</head>
<body>
  <div>
    <div class="page-container" id="app">
      <div class="page-content">
        @includeIf('rt-starter-kit::partials.sidebar')
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <div>
    <script src="{{ scontent('js/core/libraries/jquery.min.js') }}"></script>
    <script src="{{ asset('scontent/js/core/app.js') }}"></script>
    <script src="{{ scontent('js/core/libraries/bootstrap.min.js') }}"></script>
    @section('foot')
    @show
  </div>
</body>
</html>