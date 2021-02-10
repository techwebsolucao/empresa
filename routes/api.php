<?php

use App\Http\Controllers\EntrarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', [EntrarController::class, 'login'])->name('login'); #ok
