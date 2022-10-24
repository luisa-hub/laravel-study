<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Produto</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <form method="post" action="{{route("produto.store")}}">
            @csrf
            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" placeholder="Id" disabled>
              <small id="idHelp" class="form-text text-muted">Não é necessário informar o id para cadastrar o dado.</small>
            </div>
            <div class="form-group">
              <label for="id-input-nome">Nome</label>
              <input name = "nome" type="text" class="form-control" id="id-input-nome" placeholder="Digite o nome do produto">
            </div>
            <div class="form-group">
              <label for="id-input-preco">Preço</label>
              <input name = "preco" type="text" class="form-control" id="id-input-preco" placeholder="Digite o preço do produto">
            </div>
            <div class="form-group">
              <label for = 'id-select-tipo-produto'>Tipo</label>
              <select class="form-select" name="Tipo_Produtos_id" aria-label="Default select example">
                  @foreach($tipoProdutos as $tipoProduto)
                  <option value = "{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id-input-ingredientes">Ingredientes</label>
              <input name = "ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Digite os ingredientes do produto">
            </div>
            <div class="form-group">
              <label for="id-input-urlImage">Imagem</label>
              <input name = "urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="Insira a imagem">
            </div>
            <div class="my-1">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="{{route("produto.index")}}"class="btn btn-primary"> Voltar</a>
            </div>
          </form>
          
    </div>
</body>
</html>