@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')

<div class="container mt-3">
  
  <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Atenção</h4>
    <p>Contracheque não encontrado.</p>
    <hr>
    <a href="meus-contracheques"><button type="button" class="btn btn-primary">Ok</button></a>
  </div>
  
</div>
@endsection
