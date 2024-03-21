<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="Saquib" content="Blade">
<title>{{ isset($title) ? "{$title} :: " : "" }}{{ config('app.name') }} v{{ config('app.version') }}</title>

<!-- Favicons -->
<link href="/assets/img/favicon.png" rel="icon">
<link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,
    400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">


<!-- Vendor CSS Files -->
<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
@yield('styles')

<!-- Template Main CSS File -->
<link href="/assets/css/style.css?v={{ config("app.version") }}" rel="stylesheet">
<link href="/assets/css/spinner.css?v={{ config("app.version") }}" rel="stylesheet">
<link href="{{ asset('css/dialog.css?v=' . config('app.version')) }}" rel="stylesheet">

@yield('style')

<script>
    let base_url = '{{ config("app.url") }}';
    let app = {
      name: '{{ config("app.name") }}',
      url: '{{ config("app.url") }}',
      version: '{{ config("app.version") }}',
      aliases: @json(config("app.aliases"))
    }
</script>
