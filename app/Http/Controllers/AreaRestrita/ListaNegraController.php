<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;

use App\Http\Requests\ListaNegraExcluirRequest;
use App\Http\Requests\ListaNegraSalvarRequest;
use App\Models\AreaRestrita\ListaNegra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ListaNegraController extends Controller
{
    const SESSION_INDEX = "SESSION_INDEX_LISTA_NEGRA";
    /***
     * método para lista cpf inclusos na lista negra
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $session = Session::get(self::SESSION_INDEX);

        // Faz a busca
        $listas = ListaNegra::query();

        // Faz o filtro por nome se existir na sessão
        if (!empty($session['nome'])) {
            $listas->where('nome', 'LIKE', '%' . $session['nome'] . '%');
        }

        if (!empty($session['cpf'])) {
            $listas->where('cpf', 'LIKE', '%' . $session['cpf'] . '%');
        }

        $listas = $listas->paginate();

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
