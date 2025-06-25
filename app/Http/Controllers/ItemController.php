<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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

   
    public function store(Request $request, Item $item)
    {
        $item->fill($request->all());
        $item->save();

        return redirect(route('item.index'));
    }

   
    public function show(Item $item)
    {
        return view('item.show')->with('item', $item);
    }

    
    public function edit(Item $item)
    {
        return view('item.edit')->with('item', $item);
    }

    
    public function update(Request $request, Item $item)
    {
        $item->fill($request->all());
        $item->save();

        return redirect(route('item.index'));
    }

   
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect(route('item.index'));
    }
}
