<?php

namespace App\Http\Controllers;

use App\Helpers\Retorno;
use App\Models\AreaRestrita\Adocao;
use App\Models\AreaRestrita\AdocaoPergunta;
use App\Models\AreaRestrita\AdocaoResposta;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoAnimal;
use App\Models\AreaRestrita\TipoPergunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * Método que realiza a solicitação da adoção
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function salvar( Request $request )
    {
        try {
            $animal = Animal::findOrFail($request->get('animal_id'));
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar esse animal.');
        }

        /// cria a adoção
        $adocao = new Adocao();
        $adocao->fill($request->all());

        $adocao->tipo_animal_id = $animal->tipo_id;
        $adocao->situacao_id = Situacao::SITUACAO_AGUARDANDO_APROVACAO;

        /// inicia a transaction
        DB::beginTransaction();

        /// salva as informações da adoção
        try {
            $adocao->save();

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro('Não foi possível salvar as informações. Por favor, contate os administradores do site.'. $e->getMessage());
        }

        /// salva as respostas do usuário
        foreach ( $request->get('perguntas') as $pergunta_id => $resposta) {
            try {
                $pergunta = AdocaoPergunta::findOrFail($pergunta_id);
            } catch ( \Exception $e ) {
                return Retorno::deVoltaFindOrFail('Não foi possível localizar esse animal.');
            }

            /// cria a resposta
            $adocao_resposta = new AdocaoResposta();
            $adocao_resposta->adocao_id = $adocao->id;
            $adocao_resposta->adocao_pergunta_id = $pergunta_id;
            $adocao_resposta->{ $pergunta->tipo_pergunta_id == TipoPergunta::TIPO_TEXTO ? 'resposta' : 'adocao_selecao_id' } = $resposta;

            try {
                $adocao_resposta->save();

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro('Não foi possível salvar as informações. Por favor, contate os administradores do site.'.$e->getMessage());
            }
        }

        DB::commit();
        return Retorno::deVoltaSucesso('O pedido de adoção foi realizado com sucesso, e no momento encontra-se na situação AGUARDANDO APROVAÇÃO, em instantes você receberá mais informações via e-mail.');
    }
}
