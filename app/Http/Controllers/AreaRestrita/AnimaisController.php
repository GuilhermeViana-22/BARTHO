<?php

namespace App\Http\Controllers\AreaRestrita;

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

    }

    public function salvar()
    {

    }

    public function deletar()
    {

    }

    public function excluir(ExcluirRequest $request )
    {
        $animal = Animal::findOrFail($request->get('id'));

        try {
            $animal->deleteOrFail();
        } catch(\Throwable $e ){
            return back()->with('message_error', "Houve um erro ao tentar deletar o animal...");
        }

        return back()->with('message_success', "Animal deletado com sucesso!");

    }

    public function alterar()
    {

    }

    public function salvarAlteracao(){

    }
}
