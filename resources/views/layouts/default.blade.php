<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('includes.head')
    <script src="{{ asset('js/validate.js?v=' . config('app.version')) }}"></script>
</head>

@section('styles')
<link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
@endsection

<body class="d-flex flex-column bg bg-secondary bg-gradient bg-opacity-10 min-vh-100 font-sans antialiased">
    <header class="header fixed-top d-flex align-items-center">
        @include('includes.header')
    </header>

    <main id="main" class="flex-fill">
        @yield('content')
    </main>

    <a href="javascript:window.scrollTo(0,0)" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div class="toast-container position-fixed bottom-0 end-0 p-2"></div>

    <footer class="footer bg-light bg-gradient">
        @include('includes.footer')
    </footer>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js?v={{ config('app.version') }}"></script>
    <script src="{{ asset('js/app.js?v=' . config('app.version')) }}"></script>
   
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/spinner.js?v=' . config('app.version')) }}"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dialog.js?v=' . config('app.version')) }}"></script>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.min.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    @yield('scripts')

    @yield('script')
</body>

</html>
