@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
@if (count($errors))
    <div class="alert alert-danger">
       <ul>
       @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
       @endforeach
      </ul>
    </div>
@endif

@if (session('status'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Atenção!</strong> {{ session('status') }}
    
  </div>

@endif
<div class="alerta-download mt-4"></div>
<div class="container pt-4 pb-4 mt-5 corpo" style="margin-top: 100px;">
    
    <div class="container-fluid p-5 bg-light text-primary text-center">
      <img src="images/users.jpg" class="img-fluid" alt="meus dados" style="height:300px">
      <h1>Edição de Menus</h1>
      <p>Edite informações dos menus</p> 
    </div>

    <div class="container mt-3">
      <div class="m-2 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-person-plus"></i> Incluir</button>
      </div>
      <form id="update-object" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          

          <div class="row mb-3">
            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome</label>
            <div class="col-md-8 col-lg-9">
              <input name="name" type="text" class="form-control" id="name" value="{{$menu->chave}}">
            </div>
          </div>

          

          <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Valor</label>
            <div class="col-md-8 col-lg-9">
              <input name="job" type="text" class="form-control" id="Job" readonly value="{{$menu->valor}}">
            </div>
          </div>

      

          <div class="row mb-3">
            <label for="celular" class="col-md-4 col-lg-3 col-form-label">Ícone</label>
            <div class="col-md-8 col-lg-9">
              <input name="celular" type="text" class="form-control" id="celular" value="{{$menu->icone}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Ordenação</label>
            <div class="col-md-8 col-lg-9">
              <input name="email" type="email" class="form-control" id="Email" readonly value="{{$menu->numero_ordenacao}}">
            </div>
          </div>

          

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
      </form><!-- End Profile Edit Form -->
    </div>
    
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endsection



@section('script')
<script>
  var mes, ano
  $(document).ready(function(){
    $('.corpo').parent().css('margin-top', '50px')
    const date = new Date();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
  

    console.log('mes', month)
    console.log('ano', year)

    const select_mes = $('#mes option')
    $('#ano').on('change', function(){
      $(this).attr('disabled', false)
      const selected_ano = parseInt($(this).val())

      if(selected_ano >= year){
        select_mes.each((i, e) => {
          if($(e).val() >= month)
            $(e).attr('disabled', true)
        })
      }
    })
    
    $('#mes').on('change', function(e){
      console.log('e', e)
      mes = $(this).val()
      $('#contracheque_link').attr('href', `../contracheque//${mes}`)
    })
    $('#ano').on('change', function(){
      ano = $(this).val()
      $('#contracheque_link').attr('href', `../contracheque/${ano}/${mes}`)
    })

    $('#baixar').on('click', function(){
          var formData = {ano, mes}
          if(!$('#mes').val() || !$('#ano').val()){
            alert('Favor selecione um ano e um mês!')
            return
          }
          //formData = JSON.stringify(Object.fromEntries(formData));
          // console.log(formData)
          $.ajax({
                url: "../contracheque/",
                type: "post",
                data: { ano, mes},
                success: function(response){
                  console.log(response.url)
                  // $('.div-button-download').css('display', 'block')
                  // $('.pdf-link').attr('href', response.url)
                  $('.alerta-download').empty()
                  var alerta = `
                    <div class="alert alert-warning" role="alert">
                  
                      <h4 class="alert-heading">Atenção</h4>
                      <p>Caso não ocorra o download automaticamente, clique no botão abaixo!</p>
                      <hr>
                      <a href="${response.url}"><button type="button" class="btn btn-danger"  data-bs-dismiss="alert" aria-label="Close">Baixar</button></a>
                      
                    </div>
                  `
                  $('.alerta-download').append(alerta)
                  window.location.replace(response.url)
                  
                }
          })
    })
});
  
</script>
@endsection
