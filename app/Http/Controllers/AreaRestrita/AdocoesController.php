<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Adocoes\AdocoesRequest;
use App\Models\AreaRestrita\Adocao;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
}
