<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use App\Models\AreaRestrita\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaRestritaController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $animaisCadastrados = Animal::count();
        $animaisAdotados = Animal::where('adotado', true)->count();
        $animaisNaoAdotados = Animal::where('adotado', false)->count();
        $animaisVacinados = Animal::where('vacinado', true)->count();
        $animaisNaoVacinados = Animal::where('vacinado', false)->count();
        $animaisCastrados = Animal::where('castrado', true)->count();
        $animaisNaoCastrados = Animal::where('castrado', true)->count();

        // Contagem de cães e gatos
        // Contagem de cães e gatos
        $countDogs = Animal::where('tipo_id', 1)->count();
        $countCats = Animal::where('tipo_id', 2)->count();

        // Contagem de cães e gatos por sexo
        $countDogsMacho = Animal::where('tipo_id', 1)->where('sexo_id', 1)->count();
        $countDogsFemea = Animal::where('tipo_id', 1)->where('sexo_id', 2)->count();
        $countCatsMacho = Animal::where('tipo_id', 2)->where('sexo_id', 1)->count();
        $countCatsFemea = Animal::where('tipo_id', 2)->where('sexo_id', 2)->count();


        return view('Arearestrita.index', compact('usuario', 'animaisCadastrados', 'animaisAdotados', 'animaisNaoAdotados', 'animaisVacinados', 'countDogs', 'countCats', 'countDogsMacho', 'countDogsFemea', 'countCatsMacho','animaisNaoVacinados', 'countCatsFemea', 'animaisCastrados', 'animaisNaoCastrados'));
    }

    public function deslogar()
    {
        Auth::logout();

        return redirect('/');
    }
}
