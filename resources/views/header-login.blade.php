@php $base_url = $_SERVER['SERVER_NAME'] == 'localhost' ? '/domvillage/app/public' : '/public' @endphp
<script>
    let base_url = '{{ $base_url }}';
</script>
