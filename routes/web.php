<?php

use App\Http\Controllers\EntrarController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

//Middleware verificação se está logado
##

//Dashboard
Route::get('/dashboard', [EntrarController::class, 'index'])->name('dashboard');

//Produtos
Route::get('/cadastrar-produto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar_produto');
Route::post('/cadastrar-produto', [ProdutosController::class, 'escreverProduto'])->name('escrever_produto');
Route::post('/editar-produto', [ProdutosController::class, 'editarProduto'])->name('editar_produto');
Route::get('/produto/{id}', [ProdutosController::class, 'buscarProduto'])->name('buscar_produto_id');
Route::get('/produtos', [ProdutosController::class, 'listarProduto'])->name('listar_produtos');
Route::post('/remover-produto/', [ProdutosController::class, 'removerProduto'])->name('remover_produto');

//Relatorios
Route::get('/relatorio/{id}', [RelatorioController::class, 'index'])->name('relatorio_id');
Route::get('/relatorios', [RelatorioController::class, 'listarRelatorios'])->name('relatorios');
