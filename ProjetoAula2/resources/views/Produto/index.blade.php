<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index de Produto</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    
    <!-- Mensagem de texto do index-->
    {{-- <?php $message = [ "Texto a ser exibido", "warning" ] ?> --}}
    @if (isset($message))
    <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
        <span>{{$message[0]}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <a href="{{route("produto.create")}}" class="btn btn-primary">Criar Produto</a>
        <a class ="btn btn-primary" href = "#">Voltar</a>

        <table class = "table table-hover">
            <thead>
                <tr>
                    <th scope="">ID</th>
                    <th scope="">Nome</th>
                    <th scope="">Preço</th>
                    <th scope="">Tipo</th>
                    <th scope="">Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">{{$produto->id}}</th>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>
                        <a href="{{route("produto.show", $produto->id)}}" class="btn btn-primary">Mostrar</a>
                        <a href="{{route("produto.edit", $produto->id)}}" class="btn btn-secondary">Editar</a>
                        <a 
                                href="#" 
                                class="btn btn-danger class-button-destroy" 
                                data-bs-toggle="modal" 
                                data-bs-target="#destroyModal"
                                value="{{route("produto.destroy", $produto->id)}}"> 
                                    Remover
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>

    </div>


<!--Modal -->

<div class = "modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModallabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="destroyModalLabel">Confirmação de remoção</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Deseja realmente remover este recurso?
        </div>
        <div class="modal-footer">
            
            <form id="id-form-modal-botao-remover" action="/produto/4" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Confirmar remoção">
            </form>
            
        </div>
    </div>
</div>
</div>


<script>
    const arrayBtnRemover = document.querySelectorAll(".class-button-destroy");
    const formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
    
    arrayBtnRemover.forEach(btnRemover => {
        btnRemover.addEventListener("click", configurarBotaoRemoverModal);
    });
    function configurarBotaoRemoverModal(){
   
        formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
    }
</script>
    
</body>
</html>