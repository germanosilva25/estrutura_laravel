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
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Atenção</h4>
    <p>Tem certeza que deseja excluir o registro?</p>
    <hr>
    <p class="mb-0">
    <a href="/voltar">
      <button type="button" class="btn btn-primary">Não</button>
    </a>
    <a href="/confirma-excluir">
      <button type="button" class="btn btn-danger">Sim</button>
    </a>
    </p>
  </div>
@endsection



@section('script')
  <script>
    
  </script>
@endsection
