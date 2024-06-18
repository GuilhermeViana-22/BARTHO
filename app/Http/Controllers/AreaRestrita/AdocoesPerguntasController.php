<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
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
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index( Request $request )
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
}
