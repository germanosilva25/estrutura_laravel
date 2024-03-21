@php $title = 'Cadastro'; @endphp

@extends('layouts.register')

@section('style')
  <style>
    main {
      max-width: 400px;
    }

    a.logo img {
      height: 80px;
      filter: brightness(0) saturate(100%) invert(45%) sepia(40%) saturate(141%) hue-rotate(181deg) brightness(90%)
        contrast(87%);
    }

    a.logo:hover img {
      filter: brightness(0) saturate(100%) invert(8%) sepia(17%) saturate(6099%) hue-rotate(210deg) brightness(114%)
        contrast(129%);
    }
  </style>
@endsection

@section('content')
  <div class="container p-0">
    <div class="row justify-content-center py-4 m-2">
      <div class="col-md">

        <div class="d-flex justify-content-center py-4">
          <a href="{{ config('app.url') }}" class="logo d-flex align-items-center w-auto">
              </a>
            </div><!-- End Logo -->
        <div class="d-flex justify-content-center p-4">
            <img src="{{ asset('images/mobi_amarelo.jpeg') }}" alt="{{ config('app.name') }}" height="80px">
        </div>
        <div class="card shadow-sm">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Criar conta de candidato</h5>
              <p class="text-center small">Entre com seus dados para que a conta seja criada</p>
            </div>

            <form class="row g-3 needs-validation" novalidate="">
              <div class="col-12">
                <label for="nome_psicologo" class="form-label">Seu Nome</label>
                <input type="text" name="nome_psicologo" class="form-control" id="nome_psicologo" required="" >
                <div class="invalid-feedback">Por favor, digite seu nome!</div>
              </div>

              <div class="col-12">
                <label for="email_psicologo" class="form-label">Seu E-mail</label>
                <input type="email" name="email_psicologo" class="form-control" id="email_psicologo" required="" >
                <div class="invalid-feedback">Por favor digite seu endereço de e-mail!</div>
              </div>

              <div class="col-12">
                <label for="email_psicologo" class="form-label">Seu CPF</label>
                <input type="email" name="email_psicologo" class="form-control" id="email_psicologo" required="" >
                <div class="invalid-feedback">Por favor digite seu endereço de e-mail!</div>
              </div>

              <div class="col-12">
                <label for="email_psicologo" class="form-label">Sua data de nascimento</label>
                <input type="email" name="email_psicologo" class="form-control" id="email_psicologo" required="" >
                <div class="invalid-feedback">Por favor digite seu endereço de e-mail!</div>
              </div>

              <div class="col-12">
                <label for="senha_psicologo" class="form-label">Senha</label>
                <input type="password" name="senha_psicologo" class="form-control" id="senha_psicologo" required="">
                <div class="invalid-feedback">Por favor digite sua senha!</div>
              </div>

              <div class="col-12">
                <label for="confirmar_senha_psicologo" class="form-label">Confirmar senha</label>
                <input type="password" name="confirmar_senha_psicologo" class="form-control"
                  id="confirmar_senha_psicologo" required="" >
                <div class="invalid-feedback">Por favor, confirme sua senha!</div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" name="terms" type="checkbox" id="acceptTerms" required="">
                  <label class="form-check-label" for="acceptTerms">Concordo e aceito <a href="#">os
                      termos de uso e condições.</a></label>
                  <div class="invalid-feedback">Você deve aceitar com os termos de uso para
                    continuar.</div>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Criar Conta</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">
                  Já é cadastrado? <a href="{{ config('app.url') }}/login">Log in</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function () {
      $('nav').html('')
      $('form').on('submit', function (e) {
        e.preventDefault()

        if (!this.checkValidity()) return;

        console.log(new FormData(this))

        var formData = new FormData(this)
        var data = Object.fromEntries(formData);
        remove_spinner = false;
        spinner_text = "atualizando token...";

        refreshTokenLogin(_token => {
          $(".container-spinner span").text("cadastrando..");
          $.ajax({
            url: "registrar-psicologo",
            type: "post",
            data: {
              _token,
              data
            },
            success: function (response) {
              $(".container-spinner span").text("encaminhando..");
              var url = `http://localhost/novo-agathon/public`
              window.location.replace(`${base_url}/psicologo-edit`);
              return
            },
            error: function (response) {
              removeSpinner(true)
              response.responseJSON.errors.e.forEach(function(item, index){
                if(item.errorInfo[1] ==  1062)
                  alert('E-mail já cadastrado em nossa base. Faça o login!')
                else 
                  alert('Erro ao concluir o cadastro!')
              })
            }
          })
        })
      })
    })
  </script>
@endsection