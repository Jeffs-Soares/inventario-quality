<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalController;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function(){
return view ('welcome');
});


Route::resource('local', LocalController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('item', ItemController::class);
