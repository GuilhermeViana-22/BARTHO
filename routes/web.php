<?php

use App\Http\Controllers\AdoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//teste
Route::get('/adote',[AdoteController::class,'index'])->name('adote.index');
