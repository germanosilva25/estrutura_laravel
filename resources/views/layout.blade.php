<!doctype html>
<html>
<head>
    @include('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    
</head>
<body>
    <header class="row">
        @include('header')
    </header>
    <main>

        <div class="container-fluid">


        <div id="main" class="row">
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        @include('footer')
    </footer>

    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/js/menu.js?1.0.7') }}"></script>
    <script src="{{ asset('/js/dialog.js') }}"></script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('script')
</body>
</html>