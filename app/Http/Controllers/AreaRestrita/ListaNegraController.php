<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use App\Models\AreaRestrita\ListaNegra;

class ListaNegraController extends Controller
{
    /***
     * método para lista cpf inclusos na lista negra
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listas = ListaNegra::all();
        return view('Arearestrita.ListaNegra.index', compact('listas'));
    }

    /***
     * Método para incluir um novo cpf na lista negra
     */
    public function incluir()
    {

    }



}
