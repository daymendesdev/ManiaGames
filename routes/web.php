<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Avaliacoes\AvaliacaoController;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('ManiaGames')->group(function () {
    Route::get('/Avaliacoes', [AvaliacaoController::class, 'index'])->name('avaliacoes');
    Route::post('/Avaliacoes', [AvaliacaoController::class, 'store'])->name('avaliacoes.store');
});
