<?php

use App\Http\Controllers\CategoriaController;
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
