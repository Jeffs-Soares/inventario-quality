<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Models\Registro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    
    public function index(Request $request)
    {
        $categorias = Categoria::all();

        return view('categoria.index')->with('categorias', $categorias)->with('path', $request->path());
    }

   
    public function create()
    {
        return view('categoria.create');
    }

  
    public function store(CategoriaRequest $request, Categoria $categoria)
    {
        try {
            $categoria->fill($request->validated());
            $categoria->save();
            return redirect(route('categoria.index'))->with('success', 'Categoria cadastrada com sucesso!');

        } catch (Exception $e) {
            Log::error("Erro ao cadastrar o categoria ID {$categoria->id}: " . $e->getMessage(), [
                'categoria_id' => $categoria->id,
                'request_data' => $request->validated(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao cadastrar a Categoria. Tente novamente.');
        }
    }

  
    public function show(Categoria $categorium)
    {

        return view('categoria.show')->with('categoria', $categorium);
    }

  
    public function edit(Categoria $categorium)
    {
        return view('categoria.edit')->with('categoria', $categorium);
    }


    public function update(CategoriaRequest $request, Categoria $categorium)
    {
        try {
            $categorium->fill($request->validated());
            $categorium->save();
            return redirect(route('categoria.index'))->with('success', 'Categoria atualizado com sucesso!');

        } catch (Exception $e) {
            // Registra a exceção para depuração
            Log::error("Erro ao atualizar a Categoria ID {$categorium->id}: " . $e->getMessage(), [
                'categoria_id' => $categorium->id,
                'request_data' => $request->validated(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao atualizar o item. Tente novamente.');
        }
    }

    public function destroy(Categoria $categorium)
    {
        // Verifica se existem registros associados a este item
        if (Registro::where('item', $categorium->id)->exists()) {
            return redirect()->route('categoria.index')->with('error', 'Não é possível excluir a categoria, pois existem registros associados a ele.');
        }

        // Se não houver registros, tenta excluir a categoria
        try {
            $categorium->delete();
            return redirect()->route('categoria.index')->with('success', 'Categoria excluída com sucesso!');
        } catch (Exception $e) {
            // Captura qualquer exceção que possa ocorrer durante a exclusão
            return redirect()->route('categoria.index')->with('error', 'Ocorreu um erro ao tentar excluir a categoria: ' . $e->getMessage());
        }
    }
}
