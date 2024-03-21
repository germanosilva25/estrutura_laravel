@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    a.logo img {
      height: 38px;
    }

    .spinner-border {
      display: none;
    }

    form#editar .card {
      display: none;
    }

    .card>.opcao-adesao {
      min-height: 100px;
    }

    .opcao-adesao {
      background: #0a1e4b;
    }

    .opcao-adesao span:first-child {
      font-weight: bold;
      font-size: 18px;
    }

    .pricing h4 {
      font-size: 28px;
      color: #5846f9;
      font-weight: 600;
      font-family: "Roboto", sans-serif;
      margin-bottom: 20px;
    }

    .pricing h4 span {
      color: #bababa;
      font-size: 12px;
      font-weight: 300;
    }

    .btn:hover {
      background-color: #002ead !important;
      transition: 0.7s;
    }
  </style>
@endsection

@section('content')
  <div>Teste de view</div>
@endsection



@section('script')
  <script>
    
  </script>
@endsection
