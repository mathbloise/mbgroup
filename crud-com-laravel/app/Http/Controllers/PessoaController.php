<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller {
    public function index() {
        $pessoa = Pessoa::all();
        $total = Pessoa::all()->count();
        return view('list-pessoas', compact('pessoa', 'total'));
    }

    public function create() {
        return view('include-pessoa');
    }

    public function store(Request $request)
    {
      $request->validate([
        'id'=>'required|integer',
        'nome' => 'required',
        'cpf'=> 'required',
        'data_nascimento' => 'required'
      ]);
      $people = new Pessoa;
        $people->id = $request->id;
        $people->nome = $request->nome;
        $people->cpf = $request->cpf;
        $people->data_nascimento = $request->data_nascimento;
        $people->save();
        return redirect()->route('people.index')->with('message', 'Pessoa cadastrada com sucesso');
    }


    public function show($id) {
        //
    }

    public function edit($id) {
        $people = Pessoa::findOrFail($id);
        return view('alter-pessoa', compact('people'));
    }

    public function update(Request $request, $id) {
      $request->validate([
        'id'=>'required|integer',
        'nome' => 'required',
        'cpf'=> 'required',
        'data_nascimento' => 'required'
      ]);
      $people = new Pessoa;
        $people->id = $request->id;
        $people->nome = $request->nome;
        $people->cpf = $request->cpf;
        $people->data_nascimento = $request->data_nascimento;
        $people->save();
    	return redirect()->route('people.index')->with('message', 'Pessoa atualizada com sucesso');
    }

    public function destroy($id) {
    	$people = Pessoa::findOrFail($id);
    	$people->delete();
    	return redirect()->route('people.index')->with('message', 'Pessoa excluída com sucesso');
    }
}
