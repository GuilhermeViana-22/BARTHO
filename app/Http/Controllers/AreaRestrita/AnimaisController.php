<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\AnimaisRequest;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\AnimalModel;
use App\Models\AreaRestrita\TipoAnimal;

class AnimaisController extends Controller
{

    public function index( AnimaisRequest $request )
    {
        $animais = Animal::where('tipo_id', $request->get('tipo_id'))->paginate(3, ['*'], 'page', $request->get('page') ?? 1);

        $tipo = TipoAnimal::findOrFail( $request->get('tipo_id') );

        return view('Arearestrita.Animais.index', ['animais' => $animais, 'tipo' => $tipo]);
    }

    public function visualizar()
    {

    }

    public function incluir()
    {

    }

    public function salvar()
    {

    }

    public function deletar()
    {

    }

    public function excluir()
    {

    }

    public function alterar()
    {

    }

    public function salvarAlteracao(){

    }
}
