<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\AjudarController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/adote', [AdoteController::class, 'index'])->name('adote.index');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/sobreNos', [SobreController::class, 'index'])->name('sobrenos.index');
Route::get('/Ajudar', [AjudarController::class, 'index'])->name('Ajudar.index');
