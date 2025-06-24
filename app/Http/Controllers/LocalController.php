<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

        return view('local.create');

    }


    public function store(Request $request)
    {
    
        $item = new Local();
        $item->loc_descricao =  $request['loc_descricao'];
        $item->save();

        return 'Ok';

    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }
}
