<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar informações do usuário</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">

         {{-- <?php $message = [ "Texto a ser exibido", "warning" ] ?> --}}
         @if (isset($message))
         <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
             <span>{{$message[0]}}</span>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
         
        <form method="post" action="{{route("userinfo.store")}}">
            @csrf
            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Id" disabled>
              <small id="Users_id" class="form-text text-muted">Não é necessário informar o id para cadastrar o dado.</small>
            </div>
            <div class="form-group">
              <label for="id-input-image">Imagem de perfil</label>
              <input name = "profileImg" type="text" class="form-control" id="id-input-image" placeholder="Insira o caminho da imagem">
            </div>
            <div class="form-group">
                <label for="id-input-status">Status</label>
                <input name = "status" type="text" class="form-control" id="id-input-status" placeholder="Status" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-dataNasc">Data Nascimento</label>
                <input name = "dataNasc" type="date" class="form-control" id="id-input-dataNasc" placeholder="Data de nascimento" required>
            </div>
            <div class="form-group">
                <label for="id-input-genero">Gênero</label>
                <input name = "genero" type="text" class="form-control" id="id-input-genero" placeholder="Gênero" required>
            </div>
            <div class="my-1">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
    </div>
</body>
</html>