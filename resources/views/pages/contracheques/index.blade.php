@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
<div class="container mt-3">
  <h2>Envio de contracheques</h2>
  <form action="{{ route('enviar-contracheques') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
      <label for="sel1" class="form-label">Mês:</label>
      <select class="form-select" id="mes" name="mes">
        <option value="">Selecione um mês</option>
        <option value="1">Janeiro</option>
        <option value="2">Fevereiro</option>
        <option value="3">Março</option>
        <option value="4">Abril</option>
        <option value="5">Maio</option>
        <option value="6">Junho</option>
        <option value="7">Julho</option>
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="sel1" class="form-label">Ano:</label>
      <select class="form-select" id="ano" name="ano">
        <option value="">Selecione um ano</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
      </select>
    </div>
    <div class="mb-3 mt-3">
      <label for="contracheques" class="form-label">Anexe o arquivo:</label>
      <input type="file" class="form-control" id="contracheques" placeholder="Enter contracheques" name="contracheques">
    </div>
    

    <button type="submit" class="btn btn-primary mt-3">
    <div id="enviando" class="spinner-border text-light" role="status" style="display:none">
      
    </div>
    Enviar</button>
  </form>
</div>
@endsection



@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $('form').on('submit', function(event){
    event.preventDefault()
    $('button').attr('disabled', true)
    $('#enviando').css('display', 'block')
    const formData = new FormData(this)
    console.log(formData)
    console.log(document.getElementById('contracheques').files[0].type)
    $.ajax({
          url: `enviar-contracheques`,
          type:'POST',
          data: formData,
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData:false,
          success: function(){
            window.location.replace("incluidocontracheque")
          }
      });
  })
</script>
@endsection
