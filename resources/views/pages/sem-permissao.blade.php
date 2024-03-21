@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
<div class="container-fluid p-5 bg-light text-primary text-center">
      <img src="images/sem-permissao.jpg" class="img-fluid" alt="meus dados" style="height:300px">
      <h1>Você não tem permissão para acessar essa página</h1>
      <p>Verifique as suas permissões junto ao administrador do sistema!</p> 
    </div>
@endsection



@section('script')
  <script>
    
  </script>
@endsection
