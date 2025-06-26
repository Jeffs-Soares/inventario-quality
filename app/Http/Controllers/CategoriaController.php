<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Registro;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();

        return view('categoria.index')->with('categorias', $categorias);
    }

   
    public function create()
    {
        return view('categoria.create');
    }

  
    public function store(Request $request, Categoria $categoria)
    {
       
        $categoria->fill($request->all());
        $categoria->save();

        return redirect(route('categoria.index'));
    }

  
    public function show(Categoria $categorium)
    {

        return view('categoria.show')->with('categoria', $categorium);
    }

  
    public function edit(Categoria $categorium)
    {
        return view('categoria.edit')->with('categoria', $categorium);
    }


    public function update(Request $request, Categoria $categorium)
    {
        $categorium->fill($request->all());
        $categorium->save();

        return redirect(route('categoria.index'));
    }

    public function destroy(Categoria $categorium)
    {
        if (Registro::where('categoria', $categorium->id)->exists()) {
            return redirect(route('categoria.index'));
        }
      
        $categorium->delete();

        return redirect(route('categoria.index'));
    }
}
