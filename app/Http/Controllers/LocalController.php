<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Registro;
use Exception;
use Illuminate\Support\Facades\Log;

class LocalController extends Controller
{

    public function index()
    {
        $locais = Local::all();

        return view('local.index')->with('locais', $locais);
    }

    public function create()
    {
        return view('local.create');
    }


    public function store(LocalRequest $request, Local $local)
    {
        try {
            $local->fill($request->validated());
            $local->save();

            return redirect(route('local.index'))->with('success', 'Local cadastrado com sucesso!');

        } catch (Exception $e) {

            Log::error("Erro ao cadastrar o Local ID {$local->id}: " . $e->getMessage(), [
                'local_id' => $local->id,
                'request_data' => $request->validated(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao cadastrar o Local. Tente novamente.');
        }

    }


    public function show(Local $local)
    {
        return view('local.show')->with('local', $local);
    }



    public function edit(Local $local)
    {
        return view('local.edit')->with('local', $local);
    }


    public function update(LocalRequest $request, Local $local)
    {
        try {
            $local->fill($request->validated());
            $local->save();
            return redirect(route('local.index'))->with('success', 'Local atualizado com sucesso!');
        } catch (Exception $e) {
            // Registra a exceção para depuração
            Log::error("Erro ao atualizar o local ID {$local->id}: " . $e->getMessage(), [
                'local_id' => $local->id,
                'request_data' => $request->validated(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao atualizar o item. Tente novamente.');
        }
    }


    public function destroy(Local $local)
    {
         // Verifica se existem registros associados a este item
        if (Registro::where('local', $local->id)->exists()) {
            return redirect()->route('local.index')->with('error', 'Não é possível excluir o local, pois existem registros associados a ele.');
        }

        // Se não houver registros, tenta excluir o local
        try {
            $local->delete();
            return redirect()->route('local.index')->with('success', 'Local excluído com sucesso!');
        } catch (Exception $e) {
            // Captura qualquer exceção que possa ocorrer durante a exclusão
            return redirect()->route('local.index')->with('error', 'Ocorreu um erro ao tentar excluir o local: ' . $e->getMessage());
        }

    }
}
