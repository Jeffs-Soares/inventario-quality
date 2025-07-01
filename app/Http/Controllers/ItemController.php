<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Registro;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        $items = Item::all();

        return view('item.index')->with('items', $items)->with('path', $request->path());
    }


    public function create()
    {
        return view('item.create');
    }


    public function store(ItemRequest $request, Item $item)
    {
        try {
            $item->fill($request->validated());
            $item->save();

            return redirect(route('item.index'))->with('success', 'Item cadastrado com sucesso!');
        } catch (Exception $e) {

            Log::error("Erro ao cadastrar o item ID {$item->id}: " . $e->getMessage(), [
                'item_id' => $item->id,
                'request_data' => $request->validated(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao cadastrar o item. Tente novamente.');
        }
    }


    public function show(Item $item)
    {
        return view('item.show')->with('item', $item);
    }


    public function edit(Item $item)
    {
        return view('item.edit')->with('item', $item);
    }


    public function update(ItemRequest $request, Item $item)
    {
        try {

            $item->fill($request->validated());
            $item->save();
            return redirect(route('item.index'))->with('success', 'Item atualizado com sucesso!');
        } catch (Exception $e) {
            // Registra a exceção para depuração
            Log::error("Erro ao atualizar o item ID {$item->id}: " . $e->getMessage(), [
                'item_id' => $item->id,
                'request_data' => $request->validated(),
                'exception' => $e
            ]);

            // Redireciona com uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao atualizar o item. Tente novamente.');
        }
    }


    public function destroy(Item $item)
    {
        // Verifica se existem registros associados a este item
        if (Registro::where('item', $item->id)->exists()) {
            return redirect()->route('item.index')->with('error', 'Não é possível excluir o item, pois existem registros associados a ele.');
        }

        // Se não houver registros, tenta excluir o item
        try {
            $item->delete();
            return redirect()->route('item.index')->with('success', 'Item excluído com sucesso!');
        } catch (Exception $e) {
            // Captura qualquer exceção que possa ocorrer durante a exclusão
            return redirect()->route('item.index')->with('error', 'Ocorreu um erro ao tentar excluir o Item: ' . $e->getMessage());
        }
    }
}
