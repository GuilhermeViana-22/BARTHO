<?php

namespace App\Http\Controllers;

use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\TipoAnimal;

class AdoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $cachorros  = Animal::where('tipo_id', TipoAnimal::TIPO_CACHORRO)->orderBy('adotado')->paginate(10, ['*'], 'pag_cachorro');
        $gatos      = Animal::where('tipo_id', TipoAnimal::TIPO_GATO)->orderBy('adotado')->paginate(10, ['*'], 'pag_gato');

        return view('Components.Adote.index', compact('cachorros', 'gatos'));
    }
}
