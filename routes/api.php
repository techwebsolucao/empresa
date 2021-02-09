<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ProdutosController::class, 'index'])->name('dashboard_aluno');

