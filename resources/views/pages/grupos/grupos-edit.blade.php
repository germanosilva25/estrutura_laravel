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

    <form action="/update-object" id="update-object" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <input name="Object" type="text" class="form-control" id="Object" value="Grupo" hidden>
          

          <div class="row mb-3">
            <label for="nome_grupo" class="col-md-4 col-lg-3 col-form-label">Nome do grupo</label>
            <div class="col-md-8 col-lg-9">
              <input name="nome_grupo" type="text" class="form-control" id="nome_grupo" value="{{$grupo->nome_grupo}}">
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
