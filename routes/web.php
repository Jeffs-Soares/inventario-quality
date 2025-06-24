<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalController;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function(){
return view ('local.create');
});


Route::resource('local', LocalController::class);
