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
      <h1>Edição de Usuários</h1>
      <p>Edite informações dos usuários</p> 
    </div>

    <form id="update-object" action="/update-object" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
          <input name="Object" type="text" class="form-control" id="create" value="Menu" hidden>
          <div class="row mb-3">
              <label for="chave" class="col-md-4 col-lg-3 col-form-label">Nome</label>
              <div class="col-md-8 col-lg-9">
                <input name="chave" type="text" class="form-control" id="chave" value="{{$menu->chave}}">
              </div>
            </div>

            

            <div class="row mb-3">
              <label for="valor" class="col-md-4 col-lg-3 col-form-label">Valor</label>
              <div class="col-md-8 col-lg-9">
                <input name="valor" type="text" class="form-control" id="valor"  value="{{$menu->valor}}">
              </div>
            </div>

        

            <div class="row mb-3">
              <label for="icone" class="col-md-4 col-lg-3 col-form-label">Ícone</label>
              <div class="col-md-8 col-lg-9">
                <input name="icone" type="text" class="form-control" id="icone" value="{{$menu->icone}}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="numero_ordenacao" class="col-md-4 col-lg-3 col-form-label">Ordenação</label>
              <div class="col-md-8 col-lg-9">
                <input name="numero_ordenacao" type="number" class="form-control" id="numero_ordenacao"  value="{{$menu->numero_ordenacao}}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="submenu" class="col-md-4 col-lg-3 col-form-label">Terá submenus</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="submenu">
                  <option value="">Selecione uma opção</option>
                  <option value="1" {{$menu->submenu == 1 ? 'selected' :''}}>Sim</option>
                  <option value="0" {{$menu->submenu == 0 ? 'selected' :''}}>Não</option>
                </select> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="visible" class="col-md-4 col-lg-3 col-form-label">Rota será visível?</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="visible">
                  <option value="">Selecione uma opção</option>
                  <option value="1" {{$menu->visible == 1 ? 'selected' :''}}>Sim</option>
                  <option value="0" {{$menu->visible == 0 ? 'selected' :''}}>Não</option>
                </select> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="global" class="col-md-4 col-lg-3 col-form-label">Será menu para todos</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="global">
                  <option value="">Selecione uma opção</option>
                  <option value="1" {{$menu->global == 1 ? 'selected' :''}}>Sim</option>
                  <option value="0" {{$menu->global == 0 ? 'selected' :''}}>Não</option>
                </select> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="submenugroup" class="col-md-4 col-lg-3 col-form-label">Selecione o menu pai</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="submenugroup">
                <option value="">Selecione uma opção</option>
                <option value="0" selected>Será menu pai ou não pertencerá a um outro</option>
                @foreach ($menusPais as $menuPai)
                    @if($menu->submenugroup == $menuPai->id_menu)
                      <option value="{{$menuPai->id_menu}}" selected>{{$menuPai->valor}}</option>
                    @endif
                    @if(($menu->submenugroup != $menuPai->id_menu))
                      <option value="{{$menuPai->id_menu}}">{{$menuPai->valor}}</option>
                    @endif
                    
                @endforeach      
                </select> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="global" class="col-md-4 col-lg-3 col-form-label">Marque se será um submenu</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" name="issubmenu">
                  <option value="">Selecione uma opção</option>
                  <option value="1" {{$menu->issubmenu == 1 ? 'selected' :''}}>Sim</option>
                  <option value="0" {{$menu->issubmenu == 0 ? 'selected' :''}}>Não</option>
                </select> 
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
            formData.append('Object', 'Menu'); // Append CSRF token to formData
            
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
