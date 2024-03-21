<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('includes.head')
</head>

<body>
    <main class="m-auto">
        @yield('content')
    </main>

    <a href="javascript:window.scrollTo(0,0)" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.min.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    @yield('scripts')

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js?v={{config('app.version')}}"></script>
    <script src="{{ asset('js/app.js?v=' . config('app.version')) }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/spinner.js?v=' . config('app.version')) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('js/menu.js?v=1.1' . config('app.version')) }}"></script> --}}
    <script src="{{ asset('js/dialog.js?v=' . config('app.version')) }}"></script>

    @yield('script')
</body>

</html>
