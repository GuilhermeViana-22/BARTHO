<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Animais\AnimaisRequest;
use App\Http\Requests\AreaRestrita\Animais\ExcluirRequest;
use App\Http\Requests\AreaRestrita\Animais\SalvarAlteracaoRequest;
use App\Http\Requests\AreaRestrita\Animais\SalvarRequest;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AnimaisController extends Controller
{
    CONST SESSION_INDEX = "SESSION_INDEX_ANIMAIS";

    /**
     * Método que mostra todos os animais
     *
     * @param AnimaisRequest $request
     * @return Application|Factory|View
     */
    public function index( AnimaisRequest $request )
    {
        $tipo = TipoAnimal::findOrFail( $request->get('tipo_id') );

        /// tipos animais
        $tipos_animais = TipoAnimal::all();
        $session = Session::get(self::SESSION_INDEX);

        /// faz a busca
        $animais = Animal::query();
        $animais->where('tipo_id', $request->get('tipo_id'));

        /// faz o filtro
        if(!empty($session['nome'])){
            $animais->where('nome', 'LIKE', '%'.$session['nome'].'%');
        }

        /// faz o filtro
        if(!empty($session['adotado'])){
            $animais->where('adotado', ($session['adotado'] === "on" ? true : false));
        }

        $animais = $animais->paginate();

        return view('Arearestrita.Animais.index', compact('animais', 'tipo', 'tipos_animais', 'session'));
    }

    /**
     * Método para visualização de um animal
     *
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function visualizar(Request $request, $id)
    {
        $tipos_animais = TipoAnimal::all();
        $animal = Animal::findOrFail($id);

        return view('Arearestrita.Animais.visualizar', compact('tipos_animais', 'animal'));
    }

    /**
     * Método para inclusão de um novo animal
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function incluir(Request $request)
    {
        $tipos_animais = TipoAnimal::all();

        return view('Arearestrita.Animais.incluir', compact('tipos_animais'));
    }

    /**
     * Método que realiza o salvamento de um novo animal
     *
     * @param SalvarRequest $request
     * @return RedirectResponse
     */
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

        try {
            /// adiciona a imagem
            $animal->imagem = StorageHelper::salvar($request->file('imagem'), Animal::STORAGE_PATH.$animal->id );

        } catch (\Throwable $e ){
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações da imagem.");
        }

        try {
            $animal->save();

        } catch (\Throwable $e ){
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        DB::commit();

        return Retorno::deVoltaSucesso("Animal incluído com sucesso!");
    }

    /**
     * Método que realiza a exclusão de um animal
     *
     * @param ExcluirRequest $request
     * @return RedirectResponse
     */
    public function excluir(ExcluirRequest $request )
    {
        $animal = Animal::findOrFail($request->get('id'));

        try {
            $animal->deleteOrFail();
        } catch(\Throwable $e ){
            return Retorno::deVoltaErro("Houve um erro ao tentar excluir as informações.");
        }

        return Retorno::deVoltaSucesso("Animal excluído com sucesso!");
    }

    /**
     * Método que mostra a tela de alteração de um animal
     *
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function alterar(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $tipos_animais = TipoAnimal::all();

        return view('Arearestrita.Animais.alterar', compact('tipos_animais', 'animal'));
    }

    /**
     * Método que realiza o salvamento dos dados alterados de um animal
     *
     * @param SalvarAlteracaoRequest $request
     * @return RedirectResponse
     */
    public function salvarAlteracao(SalvarAlteracaoRequest $request)
    {
        $animal = Animal::findOrFail($request->get('id'));
        $animal->fill( $request->all() );

        DB::beginTransaction();

        if($request->exists('imagem') && !empty($request->file('imagem'))) {
            try {
                /// adiciona a imagem
                $animal->imagem = StorageHelper::salvar($request->file('imagem'), Animal::STORAGE_PATH.$animal->id );

            } catch (\Throwable $e ){
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações da imagem.");
            }
        }

        try {
            $animal->save();

        } catch (\Throwable $e ){
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        DB::commit();

        return Retorno::deVoltaSucesso("Animal incluído com sucesso!");
    }
}
