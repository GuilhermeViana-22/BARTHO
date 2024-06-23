<?php

namespace App\Http\Controllers;

use App\Helpers\Retorno;
use App\Mail\SendMail;
use App\Models\AreaRestrita\Adocao;
use App\Models\AreaRestrita\AdocaoPergunta;
use App\Models\AreaRestrita\AdocaoResposta;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\Permissao;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoAnimal;
use App\Models\AreaRestrita\TipoPergunta;
use App\Models\AreaRestrita\UserPermissao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $cachorros = Animal::where('tipo_id', TipoAnimal::TIPO_CACHORRO)
            ->with('porte')
            ->orderBy('adotado')
            ->paginate(6, ['*'], 'pag_cachorro');

        $gatos = Animal::where('tipo_id', TipoAnimal::TIPO_GATO)
            ->with('porte')
            ->orderBy('adotado')
            ->paginate(6, ['*'], 'pag_gato');

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

        $this->aprovarAdocoesEmail(Permissao::ADOCOES_GERENCIAR, $request->get('email'), $adocao->id);

        DB::commit();
        return Retorno::deVoltaSucesso('O pedido de adoção foi realizado com sucesso, e no momento encontra-se na situação AGUARDANDO APROVAÇÃO, em instantes você receberá mais informações via e-mail.');
    }



    public function aprovarAdocoesEmail($permissaoId, $destinatario, $adocaoId)
    {
        //notifica o destinatario que preencheu o formulario
        if(!empty($destinatario)){
            $notificacao_destinatario = [
                'body' => 'Olá, Agradecemos imensamente pelo seu interesse em adotar um de nossos animais. O seu pedido de adoção foi recebido com sucesso e está agora em fase de análise pela equipe da Barthô - Proteção Animal.Este é um passo importante no processo de adoção, e estamos dedicados a garantir que cada animal encontre o lar amoroso que merece. Nossa equipe especializada está revisando cuidadosamente todas as informações fornecidas.Em breve, você receberá mais informações detalhadas via e-mail. Enquanto isso, se tiver alguma dúvida ou precisar de mais informações, não hesite em entrar em contato conosco.Agradecemos novamente por escolher adotar e por fazer parte da nossa missão de proteger e cuidar dos animais.',
            ];
            Mail::to($destinatario)->send(SendMail::notificaAdocoesAnaliseEmail($notificacao_destinatario));
        }

        $permissao = Permissao::find($permissaoId);

        if ($permissao) {
            $usuarios = $permissao->users()->get(['users.name', 'users.email']);
            $data = [
                'body' => 'Nova solicitação de adoção recebida. Verificação urgente pela equipe em andamento.',
                'adocaoId' => $adocaoId
            ];


            foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(SendMail::analiseAdocoesEmail($data));
            }
        }


    }
}
