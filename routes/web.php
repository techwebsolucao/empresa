<?php

use App\Http\Controllers\EntrarController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Middleware verificação se está logado
##

//Sair
Route::get('/logout', [EntrarController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:sanctum']], function () {

    //Dashboard
    Route::get('/dashboard', [EntrarController::class, 'index'])->name('dashboard'); #ok

    //Produtos
    Route::get('/cadastrar-produto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar_produto'); #Ok
    Route::post('/cadastrar-produto', [ProdutosController::class, 'escreverProduto'])->name('escrever_produto'); #Ok
    Route::get('/editar-produto/{id}', [ProdutosController::class, 'editarProduto'])->name('editar_produto'); #Ok
    Route::post('/editar-produto-atualizar', [ProdutosController::class, 'editarProdutoEscrever'])->name('editar_produto_escrever'); #Ok
    Route::get('/produtos', [ProdutosController::class, 'listarProduto'])->name('listar_produtos'); #Ok
    Route::post('/remover-produto/', [ProdutosController::class, 'removerProduto'])->name('remover_produto'); #Ok
    Route::get('/baixar-produtos', [ProdutosController::class, 'baixarProdutos'])->name('baixar_produtos'); #Ok
    Route::post('/baixar-produtos', [ProdutosController::class, 'baixarProdutosEscrever'])->name('baixar_produtos_escrever'); #ok

    //Relatorios
    Route::get('/relatorio/{id}', [RelatorioController::class, 'index'])->name('relatorio_id'); #wait
    Route::get('/relatorios', [RelatorioController::class, 'listarRelatorios'])->name('relatorios'); #wait

});
