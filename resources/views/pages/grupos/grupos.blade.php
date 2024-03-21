@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')

@extends('alerts')

<div class="alerta-download mt-4"></div>
<div class="container pt-4 pb-4 mt-5 corpo" style="margin-top: 100px;">
    
    <div class="container-fluid p-5 bg-light text-primary text-center">
      <img src="images/group.jpg" class="img-fluid" alt="meus dados" style="height:300px">
      <h1>Lista de Grupos</h1>
      <p>Edite informações dos grupos</p> 
    </div>

    <div class="m-2 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-person-plus"></i> Incluir</button>
    </div>

    <div class="container mt-3">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nome do grupo</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($grupos as $grupo)
          <tr>
            <td>{{$grupo->nome_grupo}}</td>
            <td>
              <a href="prepara-editar/Grupo/{{$grupo->id_grupo}}">
                <button type="button" class="btn btn-warning btn-sm">Editar</button>
              </a>
              <a href="prepara-excluir/Grupo/{{$grupo->id_grupo}}">
                <button type="button" class="btn btn-danger btn-sm">Excluir</button>
              </a>
            </td>
            
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Inclusão de usuários</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="update-object" id="update-object" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input name="create" type="text" class="form-control" id="create" value="create" hidden>
          <input name="Object" type="text" class="form-control" id="create" value="Grupo" hidden>
            <div class="row mb-3">
              <label for="nome_grupo" class="col-md-4 col-lg-3 col-form-label">Nome do grupo</label>
              <div class="col-md-8 col-lg-9">
                <input name="nome_grupo" type="text" class="form-control" id="nome_grupo">
              </div>
            </div>

            


            <div class="row mb-3">
            <div class="col-md-3 col-lg-3"></div>
              <div class="col-md-9 col-lg-9">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

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
