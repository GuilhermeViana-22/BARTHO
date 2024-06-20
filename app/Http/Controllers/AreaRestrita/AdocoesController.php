<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Adocoes\AdocoesRequest;
use App\Http\Requests\AreaRestrita\Adocoes\AprovarRequest;
use App\Http\Requests\AreaRestrita\Adocoes\ReprovarRequest;
use App\Http\Requests\AreaRestrita\Adocoes\VisualizarRequest;
use App\Mail\SendMail;
use App\Models\AreaRestrita\Adocao;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdocoesController extends Controller
{
    CONST SESSION_INDEX = "SESSION_INDEX_ADOCOES";

    /**
     * Método que mostra todas as adoções dos animais
     *
     * @param AdocoesRequest $request
     * @return Application|Factory|View
     */
    public function index( AdocoesRequest $request )
    {
        $tipo = TipoAnimal::findOrFail( $request->get('tipo_id') );

        /// tipos animais
        $tipos_animais = TipoAnimal::all();
        $session = Session::get(self::SESSION_INDEX);

        /// situações
        $situacoes = Situacao::all();

        /// faz a busca
        $adocoes = Adocao::query();
        $adocoes->where('tipo_animal_id', $request->get('tipo_id'));

        /// faz o filtro
        if(!empty($session['situacao_id'])){
            $adocoes->where('situacao_id', $session['situacao_id']);
        }

        $adocoes = $adocoes->paginate();

        return view('Arearestrita.Adocoes.index', compact('adocoes', 'tipo', 'tipos_animais', 'situacoes', 'session'));
    }

    public function visualizar(VisualizarRequest $request, $id){

        try {
            $adocao = Adocao::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa adoção.');
        }

        return view('Arearestrita.Adocoes.visualizar', compact('adocao'));
    }

    public function aprovar( AprovarRequest $request, $id ): \Illuminate\Http\RedirectResponse
    {
        try {
            $adocao = Adocao::findOrFail($id);

        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa adoção.');
        }

        $adocao->situacao_id = Situacao::SITUACAO_CONCLUIDO;

        DB::beginTransaction();

        try {
            $adocao->save();

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        DB::commit();
        return Retorno::deVoltaSucesso("Adoção aprovada com sucesso!");
    }

    public function reprovar( ReprovarRequest $request, $id ): \Illuminate\Http\RedirectResponse
    {
        try {
            $adocao = Adocao::findOrFail($id);

        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa adoção.');
        }

        $adocao->situacao_id = Situacao::SITUACAO_REPROVADO;

        DB::beginTransaction();

        try {
            $adocao->save();

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        DB::commit();
        return Retorno::deVoltaSucesso("Adoção reprovada com sucesso!");
    }


}
