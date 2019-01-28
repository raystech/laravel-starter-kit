<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Starter Kit</title>
  <link href="{{ scontent('starterkit/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ scontent('starterkit/css/core.min.css') }}" rel="stylesheet">
  <link href="{{ scontent('starterkit/css/components.min.css') }}" rel="stylesheet">
  <link href="{{ scontent('starterkit/css/colors.min.css') }}" rel="stylesheet">
  <!-- <link href="{{ scontent('starterkit/css/styles.css') }}" rel="stylesheet"> -->
  <link href="{{ scontent('starterkit/css/icons/icomoon/styles.css') }}" rel="stylesheet">
  <link href="{{ scontent('starterkit/css/extensions.css') }}" rel="stylesheet">

  @section('head')
  @show
</head>
<body>
  @include('rt-starter-kit::partials.navbar')
  <div>
    <div class="page-container" id="app">
      <div class="page-content">
        
        @include('rt-starter-kit::partials.sidebar')
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <div>
    <script src="{{ scontent('starterkit/js/jquery.min.js') }}"></script>
    <script src="{{ scontent('starterkit/js/bootstrap.min.js') }}"></script>
    <script src="{{ scontent('starterkit/js/app.min.js') }}"></script>
    @section('scripts')
    @show
    @section('foot')
    @show
  </div>
</body>
</html>