<?php

use App\Http\Controllers\AcoesController;
use App\Http\Controllers\AdoteController;
use App\Http\Controllers\DoeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\AjudarController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/acoes', [AcoesController::class, 'index'])->name('acoes.index');
Route::get('/adote', [AdoteController::class, 'index'])->name('adote.index');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/sobreNos', [SobreController::class, 'index'])->name('sobrenos.index');
Route::get('/ajudar', [AjudarController::class, 'index'])->name('ajudar.index');
Route::get('/doe', [DoeController::class, 'index'])->name('doe.index');
