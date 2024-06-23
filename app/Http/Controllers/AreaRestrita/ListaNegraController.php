<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;

class ListaNegraController extends Controller
{
    //
    public function index()
    {
        return view('Arearestrita.ListaNegra.index');
    }
}
