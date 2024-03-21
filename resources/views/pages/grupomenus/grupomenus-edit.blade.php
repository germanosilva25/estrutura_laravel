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
      <h1>Edição de Grupos</h1>
      <p>Edite informações dos grupos</p> 
    </div>

    <form action="update-object" id="update-object" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
   
          <input name="Object" type="text" class="form-control" id="create" value="GrupoMenu" hidden>
          
            <div class="row mb-3">
              <label for="grupo" class="col-md-4 col-lg-3 col-form-label">Nome do grupo</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="id_grupo">
                  <option value="">Selecione um grupo</option>
                @foreach ($grupos as $grupo)
                  <option value="{{$grupo->id_grupo}}" {{$grupo->id_grupo == $grupomenu->id_grupo ? 'selected' : ''}}>{{$grupo->nome_grupo}}</option>
                @endforeach
                </select> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="grupo" class="col-md-4 col-lg-3 col-form-label">Nome do menu</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="id_menu">
                  <option value="">Selecione um menu</option>
                @foreach ($menus as $menu)
                  <option value="{{$menu->id_menu}}" {{$menu->id_menu == $grupomenu->id_menu ? 'selected' : ''}}>{{$menu->valor}}</option>
                @endforeach
                </select> 
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
