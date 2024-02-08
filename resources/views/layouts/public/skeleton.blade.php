<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Planilla Didáctica</title>
  <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/select2-bootstrap-5-theme.min.css') }}">
  @laravelPWA
  <style>
    body {
        /* background: #04243c; */
        font-family: 'Lato', 'Merriweather', sans-serif;
        background-color: #f8f9fa !important
    }

    .bg-dark {
        background-color: #000 !important;
        color: #fff;
    }

    .bg-warning {
      background-color: rgba(255, 184, 0, 1) !important;
    }

    .bg-secondary {
      background-color: #D6DCE5!important;
    }
  </style>
  @stack('css')
</head>
<body>
  <div id="app">
      @yield('app')
  </div>
  <script src="{{ asset('assets/jquery.slim.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/select2.full.min.js') }}"></script>
  @stack('js')
</body>
</html>
