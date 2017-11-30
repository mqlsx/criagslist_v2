<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Craigslist') - PHD values million</title>
    <link rel="stylesheet" href="/css/app.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
  </head>
  
  <body>
    @include('layouts._header')

  	<div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
  </body>
</html>




