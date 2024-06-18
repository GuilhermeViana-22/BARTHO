<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\AdocoesPerguntasRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\AlterarModalRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\ExcluirAlternativaRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\GerenciarAlternativasRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\IncluirAlternativaRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\IncluirRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\SalvarAlteracaoRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\SalvarRequest;
use App\Models\AreaRestrita\AdocaoPergunta;
use App\Models\AreaRestrita\AdocaoSelecao;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoPergunta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdocoesPerguntasController extends Controller
{
    CONST SESSION_INDEX = "SESSION_INDEX_ADOCOES_PERGUNTAS";

    /**
     * Método que mostra todas as perguntas feitas durante o processo de adoção
     *
     * @param AdocoesPerguntasRequest $request
     * @return Application|Factory|View
     */
    public function index( AdocoesPerguntasRequest $request )
    {
        /// session
        $session = Session::get(self::SESSION_INDEX);

        /// recupera todas as informações que serão usadas
        $situacoes = Situacao::all();
        $tipos_perguntas = TipoPergunta::all();

        /// faz a busca
        $perguntas = AdocaoPergunta::query();

        /// faz o filtro
        if(!empty($session['tipo_pergunta_id'])){
            $perguntas->where('tipo_pergunta_id', $session['tipo_pergunta_id']);
        }

        if(!empty($session['ativo'])){
            $perguntas->where('ativo', ($session['ativo'] === "on" ? true : false));
        } else {
            $perguntas->where('ativo', true);
        }

        $perguntas = $perguntas->paginate();

        return view('Arearestrita.AdocoesPerguntas.index', compact('perguntas', 'tipos_perguntas', 'situacoes', 'session'));
    }

    /**
     * Método que mostra a tela de inclusão
     *
     * @param IncluirRequest $request
     * @return Application|Factory|View
     */
    public function incluir( IncluirRequest $request )
    {
        $tipos_perguntas = TipoPergunta::all();

        return view('Arearestrita.AdocoesPerguntas.incluir', compact('tipos_perguntas'));
    }

    /**
     * Método que realiza o salvamento das informações
     *
     * @param SalvarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salvar( SalvarRequest $request )
    {
        $pergunta = new AdocaoPergunta();
        $pergunta->fill($request->validated());

        DB::beginTransaction();

        try {
            $pergunta->save();

        } catch ( \Throwable $e ) {
            DB::rollBack();
            return Retorno::deVoltaErro('Não foi possível salvar as informações.');
        }

        DB::commit();
        return Retorno::deVoltaSucesso('Informações salvas com sucesso.');
    }

    /**
     * Método que mostra o modal de alteração
     *
     * @param AlterarModalRequest $request
     * @param $id
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function alterarModal( AlterarModalRequest $request, $id )
    {
        $tipos_perguntas = TipoPergunta::all();

        try {
            $pergunta = AdocaoPergunta::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa pergunta.');
        }

        return view('Arearestrita.AdocoesPerguntas.alterar_modal', compact('pergunta', 'tipos_perguntas'));
    }

    /**
     * Método que realiza o salvamento das alterações
     *
     * @param SalvarAlteracaoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salvarAlteracao( SalvarAlteracaoRequest $request )
    {
        try {
            $pergunta = AdocaoPergunta::findOrFail($request->get('id'));
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa pergunta.');
        }

        $pergunta->fill($request->validated());

        DB::beginTransaction();

        try {
            $pergunta->save();

        } catch ( \Throwable $e ) {
            DB::rollBack();
            return Retorno::deVoltaErro('Não foi possível salvar as informações.');
        }

        DB::commit();
        return Retorno::deVoltaSucesso('Informações alteradas com sucesso.');
    }

    /**
     * Método que mostra a tela das alternativas de uma pergunta de múltipla escolha
     *
     * @param GerenciarAlternativasRequest $request
     * @param $id
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function gerenciarAlternativas( GerenciarAlternativasRequest $request, $id)
    {
        try {
            $pergunta = AdocaoPergunta::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa pergunta.');
        }

        $alternativas = AdocaoSelecao::where('pergunta_id', $id)->where('ativo', 1)->get();

        return view('Arearestrita.AdocoesPerguntas.gerenciar_alternativas', compact('pergunta', 'alternativas'));
    }

    public function incluirAlternativa( IncluirAlternativaRequest $request, $id )
    {

        try {
            $alternativa = AdocaoSelecao::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa alternativa.');
        }


    }

    public function excluirAlternativa( ExcluirAlternativaRequest $request, $id )
    {
        try {
            $alternativa = AdocaoSelecao::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa alternativa.');
        }


    }
}
