<?php

use App\Http\Controllers\EntrarController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [EntrarController::class, 'login'])->name('loginApi'); #ok
Route::post('/logout', [EntrarController::class, 'logoutApi'])->name('logoutApi'); #ok

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/adicionar-produto', [ProdutosController::class, 'adicionarProdutoApi'])->name('escrever_produto_api'); #Ok
    Route::post('/baixar-produtos', [ProdutosController::class, 'baixarProdutoApi'])->name('escrever_produto_api'); #Ok
});
