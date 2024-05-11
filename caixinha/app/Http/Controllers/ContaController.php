<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conta;
use App\Http\Requests\ContaRequest;
use Illuminate\Http\Request;

// Para criar view use o comando no terminal 'php artisan make:view [APP]/[NOME DA VIEW]}'

class ContaController extends Controller {
    public function index(){
        // Recupera as contas do bd e envia no front, ordenados pela coluna created_at
        $contas = Conta::orderByDesc('created_at')->get();
        return view('contas.index', ['contas' => $contas]);
    }
    public function create(){
        // Criar model php artisan make:model Conta
        return view('contas.create');
    }
    public function store(ContaRequest $request){
        // Para chamar os dados que vieram pela request $request->[NOME NO FORMULARIO]
        // dd($request->vencimento);

        // Validar o formulario
        $request->validated();

        // Cadastrar no banco de dados
        $conta = Conta::create($request->all());

        return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucess', 'Conta cadastrada com sucesso!');
    }
    public function show(Conta $conta){

        return view('contas.show',  ['conta' => $conta]);
    }
    public function edit(Conta $conta){
        return view('contas.edit',  ['conta' => $conta]);
    }
    public function update(ContaRequest $request, Conta $conta){
        // Validar o formulario
        $request->validated();

        $conta->update([
            'nome' => $request->nome,    
            'valor' => $request->valor,    
            'vencimento' => $request->vencimento,    
        ]);

        return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucess', 'Conta editada com sucesso!');
    }
    public function destroy(Conta $conta){
        $conta->delete();

        return redirect()->route('conta.index')->with('sucess', 'Conta apagada com sucesso!');
    }
}
