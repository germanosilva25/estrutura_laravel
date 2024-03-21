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
      <!-- <img src="images/capa-contracheques.jpg" class="img-fluid" alt="meus dados" style="height:300px"> -->
      <h1>Downloads de Contracheques</h1>
      <p>Emita aqui seu contracheque</p> 
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="block">
               
              <form method="post" action="/download-contracheque">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="sel1" class="form-label">Selecione o ano:</label>
                  <select class="form-select"  name="ano" id="ano">
                    <option value="">Selecione um ano</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                  </select>
                </div>

                <div class="mb-3 mt-3">
                  <label for="sel1" class="form-label">Selecione o mês:</label>
                  <select class="form-select"  name="mes" id="mes">
                    <option value="">Selecione um mês</option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                  </select>
                </div>
      
                <button id="baixar" type="submit" class="btn btn-danger mt-3"><i class="bi bi-file-earmark-pdf-fill"></i> Baixar</button>
              </div>
            </div> 
            <div class="col-sm-12 offset-sm-2 mt-5 div-button-download" style="display:none">
              <a href="" class="pdf-link"><button type="button" class="btn btn-danger btn-lg btn-block">Baixar</button></a>
            </div>       
          </form>  
    </div>
    <!-- <div class="">
      <iframe id="base64" src="" height="900px">
    </div> -->
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
  



    const select_mes = $('#mes option')
    $('#ano').on('change', function(){
      $('#mes option').each((i, e) => {
        $(e).attr('disabled', false)
      })
      $('#mes').val('') 
      console.log('mes', month)
      console.log('ano', year)
      console.log('selected ano', parseInt($(this).val()))
      $(this).attr('disabled', false)
      const selected_ano = parseInt($(this).val())
      console.log('selected_ano', $(this))

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

    // $('form').on('submit', function(e){
    //       e.preventDefault()
          
    //       var formData = {ano, mes}
    //       if(!$('#mes').val() || !$('#ano').val()){
    //         alert('Favor selecione um ano e um mês!')
    //         return
    //       }
    //       //formData = JSON.stringify(Object.fromEntries(formData));
    //       // console.log(formData)
    //       refreshToken(_token => {

    //         $.ajax({
    //               url: "/download-contracheque",
    //               type: "post",
    //               data: { _token, ano, mes},
    //               success: function(response){
    //                 console.log(response)
    //                 // $('.div-button-download').css('display', 'block')
    //                 // $('.pdf-link').attr('href', response.url)
    //                 $('.alerta-download').empty()
    //                 var alerta = `
    //                   <div class="alert alert-warning" role="alert">
                    
    //                     <h4 class="alert-heading">Atenção</h4>
    //                     <p>Caso não ocorra o download automaticamente, clique no botão abaixo!</p>
    //                     <hr>
    //                     <a href="${response.url}"><button type="button" class="btn btn-danger"  data-bs-dismiss="alert" aria-label="Close">Baixar</button></a>
                        
    //                   </div>
    //                 `
    //                 $('.alerta-download').append(alerta)
    //                 //window.location.replace(response.url)
                    
    //               }
    //         })
    //       })
    // })
});
  
</script>
@endsection
