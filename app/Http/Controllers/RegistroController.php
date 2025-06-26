<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Local;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    
    public function index()
    {
        $registros = Registro::all();
        return view('registro.index')->with('registros', $registros);
    }

   
    public function create()
    {
        return view('registro.create')->with('locais', Local::all())->with('categorias', Categoria::all())->with('items', Item::all());
    }

   
    public function store(Request $request, Registro $registro)
    {
        $registro->fill($request->all());
        $registro->save();
        return redirect(route('registro.index'));
    }

    
    public function show(string $id)
    {
        
    }

   
    public function edit(Registro $registro)
    {
        return view('registro.edit')->with('registro', $registro)
            ->with('locais', Local::all())
            ->with('categorias', Categoria::all())
            ->with('items', Item::all());
    }

    
    public function update(Request $request, Registro $registro)
    {
        $registro->fill($request->all());
        $registro->save();

        return redirect(route('registro.index'));
    }

    
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return redirect(route('registro.index'));
    }
}
