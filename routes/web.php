<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Avaliacoes\AvaliacaoController;
use App\Http\Controllers\FestasController;
Route::get('/', [HomeController::class, 'index']);

Route::prefix('ManiaGames')->group(function () {
    Route::get('/Avaliacoes', [AvaliacaoController::class, 'index'])->name('avaliacoes');
    Route::post('/Avaliacoes', [AvaliacaoController::class, 'store'])->name('avaliacoes.store');
});

Route::prefix('ManiaGames')->group(function () {
    Route::get('/festas', [FestasController::class, 'index'])->name('festas');
    Route::get('/festas/datas-ocupadas', [FestasController::class, 'datasOcupadas']);
    Route::post('/festas/agendar', [FestasController::class, 'store']);
});