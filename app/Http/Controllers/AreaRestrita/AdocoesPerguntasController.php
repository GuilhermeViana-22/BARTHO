<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\AdocoesPerguntasRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\AlterarModalRequest;
use App\Http\Requests\AreaRestrita\AdocoesPerguntas\SalvarAlteracaoRequest;
use App\Models\AreaRestrita\AdocaoPergunta;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoPergunta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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

        $perguntas = $perguntas->paginate();

        return view('Arearestrita.AdocoesPerguntas.index', compact('perguntas', 'tipos_perguntas', 'situacoes', 'session'));
    }

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

    public function salvarAlteracao( SalvarAlteracaoRequest $request )
    {

    }
}
