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
                <a class="btn btn-secondary" href="{{ route('conta.create')}}">Nova conta</a>
            </header>

            <main class="m-3 container">
                <h2 class="display-3">Detalhes da conta</h2>
                {{-- Verificar se existe a sessão 'sucess' e imprimir o valor --}}
                @if (session('sucess'))
                    {{ session('sucess') }}
                @endif

                <form  class="form-group">
                    <div class="mb-3">
                        <label class="form-label">ID: </label>
                        <input type="text" class="form-control" value="{{$conta->id}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome: </label>
                        <input type="text" class="form-control" value="{{$conta->nome}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor: </label>
                        <input type="text" class="form-control" value="{{'R$ '. number_format($conta->valor, 2, ',', '.')}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vencimento: </label>
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Recife')->format('d/m/Y') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data da criação: </label>
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Recife')->format('d/m/Y H:i:s') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ultima alteração: </label>
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Recife')->format('d/m/Y H:i:s') }}" readonly>
                    </div>
                </form>
            </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>