<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulator Interface - For Demo Purposes Only</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <script defer src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <div id="app" class="container">
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>