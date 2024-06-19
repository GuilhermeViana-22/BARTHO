<?php

namespace App\Http\Controllers;

use App\Helpers\Retorno;
use App\Models\AreaRestrita\AdocaoPergunta;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Http\Request;

class AdoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $cachorros  = Animal::where('tipo_id', TipoAnimal::TIPO_CACHORRO)->orderBy('adotado')->paginate(6, ['*'], 'pag_cachorro');
        $gatos      = Animal::where('tipo_id', TipoAnimal::TIPO_GATO)->orderBy('adotado')->paginate(6, ['*'], 'pag_gato');

        return view('Components.Adote.index', compact('cachorros', 'gatos'));
    }

    public function adotarModal( $id )
    {
        try {
            $animal = Animal::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa pergunta.');
        }

        /// faz a busca
        $perguntas = AdocaoPergunta::query();
        $perguntas->where('ativo', 1);

        /// recupera todas as perguntas
        $perguntas = $perguntas->get();

        return view('Components.Adote.adotar_modal', compact('animal', 'perguntas'));
    }

    public function salvar( Request $request )
    {

    }
}
