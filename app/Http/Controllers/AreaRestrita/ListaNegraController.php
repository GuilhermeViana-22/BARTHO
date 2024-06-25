<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\ListaNegraSalvarRequest;
use App\Http\Requests\ListaNegraAlterarRequest;
use App\Http\Requests\ListaNegraExcluirRequest;
use App\Models\AreaRestrita\ListaNegra;
use Illuminate\Support\Facades\DB;

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
        return view('Arearestrita.ListaNegra.incluir');
    }


    /***
     * Método para incluir um novo cpf na lista negra
     */
    public function salvar(ListaNegraSalvarRequest $request)
    {
        $requestData = $request->all();
        $lista = new ListaNegra();

        $lista->fill($requestData);
        DB::beginTransaction();

        try {
            $lista->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }
        DB::commit();
        return Retorno::deVoltaSucesso("CPF incluído na lista negra!");
    }

    /***
     * Método para realizar alteração do cpf do indiviuio cadastrado na lista negra
     */
    public function alterar(ListaNegraAlterarRequest $request)
    {

    }

    /***
     * método para realizar a aexclusão do pcf da lista negra
     */
    public function excluir(ListaNegraExcluirRequest $request)
    {

        try {
            $lista = ListaNegra::findOrFail($request->get('id'));
        } catch (\Throwable $e) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        try {
            $lista->deleteOrFail();
        } catch (\Throwable $e) {
            return Retorno::deVoltaErro("Houve um erro ao tentar excluir as informações.");
        }

        return Retorno::deVoltaSucesso("CPF excluído com sucesso!");
    }


}
