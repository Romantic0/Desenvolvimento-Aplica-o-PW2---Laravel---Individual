<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $query = Produto::with('categoria');

        if ($request->has('busca')) {
            $query->where('nome', 'ilike', '%' . $request->busca . '%');
        }

        $produtos = $query->get();

        return view('produtos.index', compact('produtos'));
    }


public function create()
{
    $categorias = Categoria::all();
    return view('produtos.create', compact('categorias'));
}

public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'preco' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id'
    ]);

    Produto::create($request->all());

    return redirect()->route('produtos.index')->with('success', 'Produto criado!');
}

public function edit($id)
{
    $produto = Produto::findOrFail($id);
    $categorias = Categoria::all();
    return view('produtos.edit', compact('produto', 'categorias'));
}

public function update(Request $request, $id)
{
    $produto = Produto::findOrFail($id);
    $produto->update($request->all());

    return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
}

public function destroy($id)
{
    Produto::destroy($id);
    return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
}
}