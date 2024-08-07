<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="bemtorres" />
    <title>Plantilla Didáctica</title>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/toastify/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/fontawesome-all.js') }}" crossorigin="anonymous"></script>
    {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}
    @stack('css')
</head>
<body class="sb-nav-fixed">
    @include('layouts.admin._nav')
    <div id="layoutSidenav">
        @include('layouts.admin._sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div id="app">
                      @yield('app')
                    </div>
                </div>
            </main>
            @include('layouts.admin._footer')
        </div>
    </div>

    <script src="{{ asset('assets/jquery.slim.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/toastify/toastify-js.js') }}"></script>
    <script src="{{ asset('assets/custom.js') }}"></script>

    @include('components._toastify')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="assets/demo/chart-area-demo.js"></script> --}}
    {{-- <script src="assets/demo/chart-bar-demo.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="js/datatables-simple-demo.js"></script> --}}
    @stack('js')
</body>
</html>
