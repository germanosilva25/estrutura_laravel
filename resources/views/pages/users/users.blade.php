@php $title = 'Usuários'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@extends('alerts')

@section('content')

<div class="container  corpo">
    <div class="container-fluid  bg-light text-primary text-center">
      <img src="images/users.jpg" class="img-fluid" alt="meus dados" style="height:300px">
      <h1>Lista de Usuários</h1>
      <p>Edite informações dos usuários</p> 


    </div>

    <div class="container mt-3">
      <div class="m-2 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-person-plus"></i> Incluir</button>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Avatar</th>
            <th>Nome do colaborador</th>
            <th>E-mail</th>
            <th>Grupo</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
          <tr>
            <td align="center"><img src="{{ route('image.show', ['filename' => $user->avatar]) }}" alt="Profile" height="48px"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->grupo->nome_grupo}}</td>
            <td>
              <a href="prepara-editar/User-Grupo/{{$user->id}}">
                <button type="button" class="btn btn-warning btn-sm">Editar</button>
              </a>
              <a href="prepara-excluir/User/{{$user->id}}">
                <button type="button" class="btn btn-danger btn-sm">Excluir</button>
              </a>
            </td>
            
          </tr>
         @endforeach
        </tbody>
      </table>
      {{ $users->onEachSide(5)->links() }}
      <div class="m-3 text-center">
      </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
          <input name="Object" type="text" class="form-control" id="Object" value="User" hidden>
            <div class="row mb-3">
              <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome</label>
              <div class="col-md-8 col-lg-9">
                <input name="name" type="text" class="form-control" id="name" autocomplete="off" value="{{ old('name') }}">
              </div>
            </div>

            

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
              <div class="col-md-8 col-lg-9">
                <input name="email" type="text" class="form-control" id="email" autocomplete="off" value="{{ old('email') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="celular" class="col-md-4 col-lg-3 col-form-label">Celular</label>
              <div class="col-md-8 col-lg-9">
                <input name="celular" type="text" class="form-control" id="celular" autocomplete="off" value="{{ old('celular') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="matricula" class="col-md-4 col-lg-3 col-form-label">Matrícula</label>
              <div class="col-md-8 col-lg-9">
                <input name="matricula" type="text" class="form-control" id="matricula" autocomplete="off" value="{{ old('matricula') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="cargo" class="col-md-4 col-lg-3 col-form-label">Cargo</label>
              <div class="col-md-8 col-lg-9">
                <input name="cargo" type="text" class="form-control" id="cargo" autocomplete="off"  value="{{ old('cargo') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="documento" class="col-md-4 col-lg-3 col-form-label">CPF</label>
              <div class="col-md-8 col-lg-9">
                <input name="documento" type="text" class="form-control" id="documento" autocomplete="off" value="{{ old('documento') }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="grupo" class="col-md-4 col-lg-3 col-form-label">Grupo do usuário</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="id_grupo">
                  <option value="">Selecione um grupo</option>
                @foreach ($grupos as $grupo)
                  <option value="{{$grupo->id_grupo}}">{{$grupo->nome_grupo}}</option>
                @endforeach
                </select> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-lg-3 col-form-label">Senha</label>
              <div class="col-md-8 col-lg-9">
                <input name="password" type="password" class="form-control autocomplete-off" id="password" autocomplete="false">
              </div>
            </div>

            <div class="row mb-3">
              <label for="avatar" class="col-md-4 col-lg-3 col-form-label">Avatar</label>
              <div class="col-md-8 col-lg-9">
                <input name="avatar" type="file" class="form-control" id="avatar" >
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
