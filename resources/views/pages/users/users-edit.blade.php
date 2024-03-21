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
      <img src="images/users.jpg" class="img-fluid" alt="meus dados" style="height:300px">
      <h1>Edição de Usuários</h1>
      <p>Edite informações dos usuários</p> 
    </div>

    <form action="/update-object" id="update-object" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <input name="Object" type="text" class="form-control" id="Object" value="User" hidden>
          <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem do Perfil</label>
            <div class="col-md-8 col-lg-9">
              <img src="{{ route('image.show', ['filename' => $user->avatar]) }}" alt="Profile" height="80px">
              <div class="pt-2">
                <input type="file" class="form-control" id="avatar" placeholder="Digite o nome do grupo"  name="avatar" value="{{$user->avatar}}" accept="image/*" hidden>
                <button id="imagem-perfil" type="button" class="btn btn-primary mt-3 btn-sm"><i class="bi bi-upload"></i></button>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome</label>
            <div class="col-md-8 col-lg-9">
              <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}">
            </div>
          </div>

          <div class="row mb-3">
              <label for="grupo" class="col-md-4 col-lg-3 col-form-label">Grupo do usuário</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="id_grupo">
                  <option value="">Selecione um grupo</option>
                @foreach ($grupos as $grupo)
                  @if ($grupo->id_grupo == $user->id_grupo)
                  <option value="{{$grupo->id_grupo}}" selected>{{$grupo->nome_grupo}}</option>
                  @else
                  <option value="{{$grupo->id_grupo}}">{{$grupo->nome_grupo}}</option>
                  @endif
                @endforeach
                </select> 
              </div>
            </div>

          <div class="row mb-3">
            <label for="celular" class="col-md-4 col-lg-3 col-form-label">Celular</label>
            <div class="col-md-8 col-lg-9">
              <input name="celular" type="text" class="form-control" id="celular" value="{{$user->celular}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
            <div class="col-md-8 col-lg-9">
              <input name="email" type="email" class="form-control" id="Email" readonly value="{{$user->email}}">
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-lg-3 col-form-label">Senha do Usuário</label>
            <div class="col-md-8 col-lg-9">
              <input name="password" type="password" class="form-control" id="password" value="">
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
      </form><!-- End Profile Edit Form -->

    
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endsection



@section('script')
<script>
  var mes, ano
  $(document).ready(function(){
    $('#imagem-perfil').on('click', function(){
      $('#avatar').click()
    })
   
    $('#update-object').on('submit', function(event){
      return;
        console.log(event);
        event.preventDefault();
        let formData = new FormData(this);
        
        refreshToken(_token => {
            formData.append('_token', _token); // Append CSRF token to formData
            formData.append('Object', 'User'); // Append CSRF token to formData
            
            $.ajax({
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                url: "/update-object",
                type: "post",
                data: formData,
                success: function(response){
                    console.log(response);
                }
            });
        });
    });



    
    
   

    
});
  
</script>
@endsection
