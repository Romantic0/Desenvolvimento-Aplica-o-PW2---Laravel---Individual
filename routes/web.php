<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return redirect()->route('produtos.index');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
