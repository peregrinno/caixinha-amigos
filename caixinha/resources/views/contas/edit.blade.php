<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Caixinha</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <h1 class="display-2">Projeto Caixinha</h1>
                <a class="btn btn-secondary" href="{{ route('conta.index')}}">Listar contas</a>
            </header>

            <main class="m-3 container">
                <h2 class="display-3">Editar caixinha</h2>

                @if ($errors->any())
                    <span>
                        @foreach ($errors->all() as $error)
                        {{$error}}</br>
                        @endforeach
                    </span>
                @endif

                <form action="{{ route('conta.update', ['conta' => $conta->id]) }}" method="post" class="form-group">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome: </label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome da caixinha"  value="{{old('nome', $conta->nome)}}">
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor: </label>
                        <input type="text" id="valor" name="valor" class="form-control" placeholder="Valor da caixinha" value="{{old('nome', $conta->valor)}}">
                    </div>
                    <div class="mb-3">
                        <label for="vencimento" class="form-label">Vencimento: </label>
                        <input type="date" id="vencimento" name="vencimento" class="form-control" value="{{ old('nome', $conta->vencimento)}}" >
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    
                    
                    
                </form>
            </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>