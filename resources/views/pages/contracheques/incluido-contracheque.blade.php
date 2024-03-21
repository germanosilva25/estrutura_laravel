@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
<div class="container mt-3">


  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Sucesso</h4>
    <p>Contracheques incluídos com sucesso.</p>
    <hr>
    <a href="contracheques"><button type="button" class="btn btn-primary">Ok</button></a>
  </div>
  
</div>

@endsection
