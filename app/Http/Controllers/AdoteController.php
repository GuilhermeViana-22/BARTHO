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
        $cachorros  = Animal::where('tipo_id', TipoAnimal::TIPO_CACHORRO)->paginate(10);
        $gatos      = Animal::where('tipo_id', TipoAnimal::TIPO_GATO)->paginate(10);

        return view('Components.Adote.index', compact('cachorros', 'gatos'));
    }
}
