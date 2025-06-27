<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\RegistroController;


Route::get('/', function(){
return redirect(route('registro.index'));
});

Route::resource('local', LocalController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('item', ItemController::class);
Route::resource('registro', RegistroController::class);
