@php $title = 'Dashboard'; @endphp

@extends('layouts.default')

@section('style')
  <style>
    
  </style>
@endsection

@section('content')
<div class="alerta-download mt-4"></div>
<div class="container pt-4 pb-4 mt-5 corpo" style="margin-top: 100px;">
<div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ route('image.show', ['filename' => $user->avatar]) }}" alt="Profile" class="rounded-circle" height="128px">
              <h2>{{$user->name}}</h2>
              <h5>{{$user->cargo}}</h5>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Configuração</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar Senha</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Detalhaes do perfil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nome</div>
                    <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Cargo</div>
                    <div class="col-lg-9 col-md-8">{{$user->cargo}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Celular</div>
                    <div class="col-lg-9 col-md-8">{{ '(' . substr($user->celular, 0, 2) . ') ' . substr($user->celular, 2, 5) . '-' . substr($user->celular, 7, 4) }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="update-object" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
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

                    

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="updatePassword" method="post">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha Atual</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control" id="currentPassword"  autocomplete="off" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Nova senha</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password">
                        <div class="my-2">
                        <span id="possui_maiuscula" class="text-danger"><i class="bi bi-dash-circle"></i> Uma letra maiúscula</span><br>
                        <span id="possui_numero" class="text-danger"><i class="bi bi-dash-circle"></i> Um número</span><br>
                        <span id="possui_simbolo" class="text-danger"><i class="bi bi-dash-circle"></i> Um símbolo</span><br>
                        <span id="possui_tamanho" class="text-danger"><i class="bi bi-dash-circle"></i> Pelo menos 8 caracteres</span><br>
                        <span id="senhas_iguais" class="text-danger"><i class="bi bi-dash-circle"></i> Senhas iguais</span><br>
                          <!-- <span id="possui_maiuscula" class="text-danger"><i class="bi bi-dash-circle"></i> Uma letra maiúscula</span><br>
                          <span id="possui_numero" class="text-danger"><i class="bi bi-dash-circle"></i> Um número</span><br>
                          <span id="possui_simbolo" class="text-danger"><i class="bi bi-dash-circle"></i> Um símbolo</span><br>
                          <span id="possui_oito_digitos" class="text-danger"><i class="bi bi-dash-circle"></i> Oito dígitos</span><br> -->
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Redigite a nova senha</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        <span id="possui_maiuscula_renewpassword" class="text-danger"><i class="bi bi-dash-circle"></i> Uma letra maiúscula</span><br>
                        <span id="possui_numero_renewpassword" class="text-danger"><i class="bi bi-dash-circle"></i> Um número</span><br>
                        <span id="possui_simbolo_renewpassword" class="text-danger"><i class="bi bi-dash-circle"></i> Um símbolo</span><br>
                        <span id="possui_tamanho_renewpassword" class="text-danger"><i class="bi bi-dash-circle"></i> Pelo menos 8 caracteres</span><br>
                        <span id="senhas_iguais_renewpassword" class="text-danger"><i class="bi bi-dash-circle"></i> Senhas iguais</span><br>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Atualizar senha</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
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
    $('#imagem-perfil').on('click', function(){
      $('#avatar').click()
    })
   
    $('form').on('submit', function(event){
        event.preventDefault();
        let message_warning = '', erro = false
        if($(this).attr('id') == 'updatePassword'){
          
          if(!$('#currentPassword').val().length){
            message_warning = 'Favor digite a senha atual!'
            erro = true
          }
          
          else if(!$('#password').val().length || !$('#renewPassword').val().length){
            message_warning = 'Favor digite a nova senha nos dois campos!'
            erro = true
          }
          
          else if(!senha_atende_padrao){
            message_warning = 'As senhas digitadas devem ser iguais e atenderem ao padrão exibido!'
            erro = true
          }

          if(erro){
            dialog.warning({
              title:'Atenção!',
              message:message_warning,
              buttons: [
                  {
                      text: 'OK'
                  }]
            })
            return
          }

        }

        let formData = new FormData(this);
        
        refreshToken(_token => {
            formData.append('_token', _token); // Append CSRF token to formData
            formData.append('Object', 'User'); // Append CSRF token to formData
            
            $.ajax({
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                url: "update-object",
                type: "post",
                data: formData,
                success: function(response){
                  console.log(response);
                  dialog.success({
                    title:'Sucesso!',
                    message: response.message,
                    buttons: [
                        {
                            text: 'OK'
                        }]
                  })
                },
                error: function(response){
                    console.log(response);
                    let json = JSON.parse(response.responseText);
                    console.log(json);
                    dialog.warning({
                      title:'Atenção!',
                      message: json.message,
                      buttons: [
                          {
                              text: 'OK'
                          }]
                    })
                },
            });
        });
    });

    $('#password').on('keyup', function(){
      validarSenha($(this).val())
    })
    $('#renewPassword').on('keyup', function(){
      validarSenhaRedigitada($(this).val())
    })
    let senha_atende_padrao = false
    function validarSenha(senha) {
        const possuiMaiuscula = /[A-Z]/.test(senha);
        const possuiNumero = /\d/.test(senha);
        const possuiSimbolo = /[!@#$%^&*()_+={}\[\]|\\:;"'<,>.?/`~]/.test(senha);
        const possuiTamanho = senha.length >= 8;

        toggleIcon('#possui_maiuscula', possuiMaiuscula);
        toggleIcon('#possui_numero', possuiNumero);
        toggleIcon('#possui_simbolo', possuiSimbolo);
        toggleIcon('#possui_tamanho', possuiTamanho);

        toggleIcon('#senhas_iguais_renewpassword', $('#password').val() == $('#renewPassword').val());
        toggleIcon('#senhas_iguais', $('#password').val() == $('#renewPassword').val());

    }

    function validarSenhaRedigitada(senha) {
        const possuiMaiuscula = /[A-Z]/.test(senha);
        const possuiNumero = /\d/.test(senha);
        const possuiSimbolo = /[!@#$%^&*()_+={}\[\]|\\:;"'<,>.?/`~]/.test(senha);
        const possuiTamanho = senha.length >= 8;

        toggleIcon('#possui_maiuscula_renewpassword', possuiMaiuscula);
        toggleIcon('#possui_numero_renewpassword', possuiNumero);
        toggleIcon('#possui_simbolo_renewpassword', possuiSimbolo);
        toggleIcon('#possui_tamanho_renewpassword', possuiTamanho);

        toggleIcon('#senhas_iguais_renewpassword', $('#password').val() == $('#renewPassword').val());
        toggleIcon('#senhas_iguais', $('#password').val() == $('#renewPassword').val());

        if($('#password').val() == $('#renewPassword').val() && possuiMaiuscula && possuiNumero && possuiSimbolo && possuiTamanho)
          senha_atende_padrao = true
        else
          senha_atende_padrao = false
    }

    function toggleIcon(elementId, condition) {
      console.log('senha_atende_padrao', senha_atende_padrao)
        const $element = $(elementId);
        const $icon = $element.find('i');
        if (condition) {
            $icon.removeClass('bi-dash-circle').addClass('bi-check2');
            $element.removeClass('text-danger').addClass('text-success');
        } else {
            $icon.removeClass('bi-check2').addClass('bi-dash-circle');
            $element.removeClass('text-success').addClass('text-danger');
        }
    }

    $('#currentPassword').val('') 



    
    
   

    
});
  
</script>
@endsection
