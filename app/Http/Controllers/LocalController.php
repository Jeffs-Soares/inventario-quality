<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Registro;

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


    public function store(Request $request, Local $local)
    {
        
        $local->fill($request->all());
        $local->save();

        return redirect(route('local.index'));
    }


    public function show(Local $local)
    {
        return view('local.show')->with('local', $local);
    }



    public function edit(Local $local)
    {
        return view('local.edit')->with('local', $local);
    }


    public function update(Request $request, Local $local)
    {
        $local->fill($request->all());
        $local->save();

        return redirect(route('local.index'));
    }


    public function destroy(Local $local)
    {

        if (Registro::where('local', $local->id)->exists()) {
            return redirect(route('local.index'));
        }
        
        $local->delete();

        return redirect(route('local.index'));
    }
}
