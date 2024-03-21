<div class="container" style="margin-top: 100px;float:right;width:40%;">
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
    <strong>Mensagem:</strong> {{ session('status') }}
    
  </div>

@endif

@if (session('status_erro'))
  <div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Atenção:</strong> {{ session('status_erro') }}
    
  </div>

@endif
</div>

