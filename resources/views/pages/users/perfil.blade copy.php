@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
<div class="alerta-download mt-4"></div>
<div class="container pt-4 pb-4 mt-5 corpo" style="margin-top: 100px;">
    
    <div class="container-fluid p-5 bg-light text-primary text-center">
      <img src="images/profile.jpg" class="img-fluid" alt="meus dados" style="height:300px">
      <h1>Meu Perfil</h1>
      <p>Edite aqui as informações do seu perfil</p> 
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="block">
               
                <div class="mb-3 mt-3">
                  <label for="nome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="name" placeholder="Digite o nome" name="name" value="{{$user->name}}">
                </div>
               
                <div class="mb-3 mt-3">
                  <label for="email" class="form-label">E-mail</label>
                  <input type="email" class="form-control" id="email" placeholder="Digite o email" readonly email="name" value="{{$user->email}}">
                </div>
               
                <div class="mb-3 mt-3">
                  <label for="grupo" class="form-label">Grupo</label>
                  <input type="text" class="form-control" id="grupo" placeholder="Digite o nome do grupo" readonly name="grupo" value="{{$user->grupo->nome_grupo}}">
                </div>
               
                <div class="mb-3 mt-3">
                  <label for="avatar" class="form-label">Avatar</label>
                  <input type="text" class="form-control" id="avatar" placeholder="Digite o nome do grupo"  name="avatar" value="{{$user->avatar}}">
                  <div class="p-2 m-2">
            
                    <img src="{{ route('image.show', ['filename' => $user->avatar]) }}" alt="" height="50px">

                  </div>
                </div>

      
                <button id="baixar" type="button" class="btn btn-primary mt-3"><i class="bi bi-floppy-fill"></i> Salvar</button>
                
            </div>
        </div> 
        <div class="col-sm-12 offset-sm-2 mt-5 div-button-download" style="display:none">
          <a href="" class="pdf-link"><button type="button" class="btn btn-primary btn-lg btn-block"> Salvar</button></a>
        </div>       
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
