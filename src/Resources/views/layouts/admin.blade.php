<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Starter Kit</title>
  <link href="{{ asset('starterkit/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('starterkit/css/core.min.css') }}" rel="stylesheet">
  <link href="{{ asset('starterkit/css/components.min.css') }}" rel="stylesheet">
  <link href="{{ asset('starterkit/css/colors.min.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('starterkit/css/styles.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('starterkit/css/icons/icomoon/styles.css') }}" rel="stylesheet">
  <link href="{{ asset('starterkit/css/extensions.css') }}" rel="stylesheet">

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
          <div class="content pb-0">
          </div>
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <div>
    <script src="{{ asset('starterkit/js/jquery.min.js') }}"></script>
    <script src="{{ asset('starterkit/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('starterkit/js/app.min.js') }}"></script>
    @section('scripts')
    @show
    @section('foot')
    @show
  </div>
</body>
</html>