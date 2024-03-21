@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
<div class="container mt-3">
  
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Atenção</h4>
    <p>Erro ao enviar os contracheques.</p>
    <ul>
      <li>Verifique se selecionou o mês</li>
      <li>Verifique se selecionou o ano</li>
      <li>Verifique se anexou um arquivo válido</li>
    </ul>
    <hr>
    <a href="contracheques"><button type="button" class="btn btn-primary">Ok</button></a>
  </div>
  
</div>

@endsection
