<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Local;
use App\Models\Registro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistroController extends Controller
{

    public function index()
    {
        $registros = Registro::all();
        return view('registro.index')->with('registros', $registros);
    }


    public function create()
    {

        $locais = Local::all();
        $categorias = Categoria::all();
        $items = Item::all();

        if ($locais->isEmpty()) {
            return redirect()->back()->withInput()->with('error', 'Não existem locais cadastrados para continuar o registro.');
        } 

        if ($categorias->isEmpty()) {
             return redirect()->back()->withInput()->with('error', 'Não existem categorias cadastrados para continuar o registro.');
        } 

        if ($items->isEmpty()) {
             return redirect()->back()->withInput()->with('error', 'Não existem items cadastrados para continuar o registro.');
        } 
    

        return view('registro.create')->with('locais', Local::all())->with('categorias', Categoria::all())->with('items', Item::all());
    }


    public function store(Request $request, Registro $registro)
    {
        try {
            $registro->fill($request->all());
            $registro->save();

            return redirect(route('registro.index'))->with('success', 'Registro cadastrado com sucesso!');
        } catch (Exception $e) {

            Log::error("Erro ao cadastrar o Registro ID {$registro->id}: " . $e->getMessage(), [
                'registro_id' => $registro->id,
                'request_data' => $request->all(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao cadastrar o registro. Tente novamente.');
        }
    }


    public function show(string $id) {}


    public function edit(Registro $registro)
    {
        return view('registro.edit')->with('registro', $registro)
            ->with('locais', Local::all())
            ->with('categorias', Categoria::all())
            ->with('items', Item::all());
    }


    public function update(Request $request, Registro $registro)
    {
        try {

            $registro->fill($request->all());
            $registro->save();
            return redirect(route('registro.index'))->with('success', 'Registro atualizado com sucesso!');
        } catch (Exception $e) {
            // Registra a exceção para depuração
            Log::error("Erro ao atualizar o registro ID {$registro->id}: " . $e->getMessage(), [
                'registro_id' => $registro->id,
                'request_data' => $request->all(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao atualizar o registro. Tente novamente.');
        }
    }


    public function destroy(Registro $registro)
    {
        try {
            $registro->delete();
            return redirect()->route('registro.index')->with('success', 'Registro excluído com sucesso!');
        } catch (Exception $e) {
            // Captura qualquer exceção que possa ocorrer durante a exclusão
            return redirect()->route('registro.index')->with('error', 'Ocorreu um erro ao tentar excluir o registro: ' . $e->getMessage());
        }
    }
}
