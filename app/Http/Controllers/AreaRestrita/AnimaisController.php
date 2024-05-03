<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Animais\AnimaisRequest;
use App\Http\Requests\AreaRestrita\Animais\ExcluirRequest;
use App\Http\Requests\AreaRestrita\Animais\SalvarRequest;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnimaisController extends Controller
{

    public function index( AnimaisRequest $request )
    {
        $animais = Animal::where('tipo_id', $request->get('tipo_id'))->paginate();

        $tipo = TipoAnimal::findOrFail( $request->get('tipo_id') );

        return view('Arearestrita.Animais.index', ['animais' => $animais, 'tipo' => $tipo]);
    }

    public function visualizar(Request $request)
    {

    }

    public function incluir(Request $request)
    {
        $tipos_animais = TipoAnimal::all();

        return view('Arearestrita.Animais.incluir', compact('tipos_animais'));
    }

    public function salvar(SalvarRequest $request)
    {
        $animal = new Animal();
        $animal->fill( $request->all() );

        DB::beginTransaction();

        try {
            $animal->save();

        } catch (\Throwable $e ){
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        /// adiciona a imagem
        $animal->imagem = StorageHelper::salvar($request->file('imagem'), Animal::STORAGE_PATH.$animal->id );

        try {
            $animal->save();

        } catch (\Throwable $e ){
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar deletar o animal...");
        }

        DB::commit();

        return Retorno::deVoltaSucesso("Animal incluído com sucesso!");
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

    public function alterar(Request $request)
    {

    }

    public function salvarAlteracao(Request $request){

    }
}
