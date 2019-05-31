<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function index() {
        $produto = Produto::all();
        $total = Produto::all()->count();
        return view('list-produtos', compact('produto', 'total'));
    }

    public function create() {
        return view('include-produto');
    }

    public function store(Request $request)
    {
      $request->validate([
        'id'=>'required|integer',
        'codigo'=> 'required',
        'nome' => 'required',
        'preco_unitario' => 'required'
      ]);
      $product = new Produto;
        $product->id = $request->id;
        $product->codigo = $request->codigo;
        $product->nome = $request->nome;
        $product->preco_unitario = $request->preco_unitario;
        $product->save();
        return redirect()->route('product.index')->with('message', 'Produto cadastrado com sucesso');
    }


    public function show($id) {
        //
    }

    public function edit($id) {
        $product = Produto::findOrFail($id);
        return view('alter-produto', compact('product'));
    }

    public function update(Request $request, $id) {
      $request->validate([
        'id'=>'required|integer',
        'codigo'=> 'required',
        'nome' => 'required',
        'preco_unitario' => 'required'
      ]);
      $product = Produto::findOrFail($id);
        $product->id = $request->id;
        $product->codigo = $request->codigo;
        $product->nome = $request->nome;
        $product->preco_unitario = $request->preco_unitario;
        $product->save();
    	return redirect()->route('product.index')->with('message', 'Produto atualizado com sucesso');
    }

    public function destroy($id) {
    	$product = Produto::findOrFail($id);
    	$product->delete();
    	return redirect()->route('product.index')->with('message', 'Produto excluído com sucesso');
    }
}
