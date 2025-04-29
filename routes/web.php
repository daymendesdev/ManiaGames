<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Avaliacoes\AvaliacoesController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/avaliacoes', [AvaliacoesController::class, 'index'])->name('avaliacoes');


