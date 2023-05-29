<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobreNos', function () {
    return view('sobreNos');
});
Route::get('/adote', function () {
    return view('adote');
});
Route::get('/contato', function () {
    return view('contato');
});
