<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Animais\AnimaisRequest;
use App\Http\Requests\AreaRestrita\Animais\ExcluirRequest;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\TipoAnimal;

class AnimaisController extends Controller
{

    public function index( AnimaisRequest $request )
    {
        $animais = Animal::where('tipo_id', $request->get('tipo_id'))->paginate();

        $tipo = TipoAnimal::findOrFail( $request->get('tipo_id') );

        return view('Arearestrita.Animais.index', ['animais' => $animais, 'tipo' => $tipo]);
    }

    public function visualizar()
    {

    }

    public function incluir()
    {
        $tipos_animais = TipoAnimal::all();

        return view('Arearestrita.Animais.incluir', compact('tipos_animais'));
    }

    public function salvar()
    {

    }

    public function excluir(ExcluirRequest $request )
    {
        $animal = Animal::findOrFail($request->get('id'));

        try {
            $animal->deleteOrFail();
        } catch(\Throwable $e ){
            return Retorno::deVoltaErro("Houve um erro ao tentar deletar o animal...");
        }

        return Retorno::deVoltaSucesso("Animal excluído com sucesso!");
    }

    public function alterar()
    {

    }

    public function salvarAlteracao(){

    }
}
