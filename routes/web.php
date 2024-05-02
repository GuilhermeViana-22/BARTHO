<?php

use App\Http\Controllers\AcoesController;
use App\Http\Controllers\AdoteController;
use App\Http\Controllers\DoeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\AjudarController;
use App\Http\Controllers\AreaRestrita\AnimaisController;
use App\Http\Controllers\AreaRestrita\AreaRestritaController;
use App\Http\Controllers\AreaRestrita\UsuariosController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/acoes', [AcoesController::class, 'index'])->name('acoes.index');
Route::get('/adote', [AdoteController::class, 'index'])->name('adote.index');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/sobreNos', [SobreController::class, 'index'])->name('sobrenos.index');
Route::get('/ajudar', [AjudarController::class, 'index'])->name('ajudar.index');
Route::get('/doe', [DoeController::class, 'index'])->name('doe.index');

//// rota para deslogar
Route::get('/deslogar', [AreaRestritaController::class, 'deslogar'])->name('deslogar');

//// ROTAS PROTEGIDAS PRECISAM ESTAR DENTRO DESSE MIDLEWARE!! \\\
Route::middleware(['auth'])->prefix('arearestrita')->name('arearestrita')->group(function () {
    Route::get('/', [AreaRestritaController::class, 'index']);


   // Grupo de rotas para animais
    Route::prefix('animais')->name('.animais')->group(function () {
        // Rota para a lista de animais
        Route::get('/', [AnimaisController::class, 'index']);

        // Rotas adicionais para animais...
    });

    // Grupo de rotas para usuários
    Route::prefix('usuarios')->name('.usuarios')->group(function () {
        // Rota para a lista de usuários
        Route::get('/', [UsuariosController::class, 'index']);

        // Rotas adicionais para usuários...
    });
});
