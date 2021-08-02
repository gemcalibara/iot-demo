<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LC - Test</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <script defer src="{{ asset('js/app.js') }}"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
</head>

<body>
  <div id="app2">
    @yield('main')
    @yield('footer')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>