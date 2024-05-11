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

            @if (session('sucess'))
                    {{ session('sucess') }}
            @endif

            <main class="m-3 container">
                <h2 class="display-3">Listar as contas</h2>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contas as $conta)
                        <tr>
                            <th scope="row">{{$conta->id}}</th>
                            <td>{{$conta->nome}}</td>
                            <td>{{'R$ '. number_format($conta->valor, 2, ',', '.')}}</td>
                            <td>{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Recife')->format('d/m/Y') }}</td>
                            <td class="d-flex gap-3">
                                <a class="btn btn-primary" href="{{ route('conta.show', ['conta' => $conta->id])}}">Ver</a>
                                <a class="btn btn-warning" href="{{ route('conta.edit', ['conta' => $conta->id])}}">Editar</a>
                                <form action="{{ route('conta.destroy', ['conta' => $conta->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar esta conta?')" type="submit">Apagar</button> 
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <th scope="row">-</th>
                        <td>-</td>
                        <td>-</td>
                        <td>@-</td>
                    </tr>
                    @endforelse
                    
                    
                </tbody>
                </table>

                 
                
                
            </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>