<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Registro;
use Exception;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all();

        return view('item.index')->with('items', $items);
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
        if (Registro::where('item', $item->id)->exists()) {
            return redirect(route('item.index'));
        }

        $item->delete();
        return redirect(route('item.index'));
    }
}
