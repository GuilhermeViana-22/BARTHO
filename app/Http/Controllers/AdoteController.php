<?php

namespace App\Http\Controllers;

use App\Helpers\Retorno;
use App\Mail\SendMail;
use App\Models\AreaRestrita\Adocao;
use App\Models\AreaRestrita\AdocaoPergunta;
use App\Models\AreaRestrita\AdocaoResposta;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\ListaNegra;
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
        $adocao->situacao_id = Situacao::SITUACAO_EM_ANALISE;

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

        $this->aprovarAdocoesEmail(Permissao::ADOCOES_GERENCIAR, $request->get('email'), $request->get('cpf'), $adocao->id, $animal->id );

        DB::commit();

        /// recupera a situação
        $situacao = Situacao::find(Situacao::SITUACAO_EM_ANALISE);

        $badge = sprintf("<span class='badge' style='background-color: %s'>%s</span>", $situacao->cor, $situacao->situacao);
        return Retorno::deVoltaSucesso(sprintf("Muito obrigado! A sua candidatura de adoção foi registrada com sucesso e, neste momento, encontra-se na situação %s. Nosso time de Adoções já foi comunicado e, o mais breve possível, um dos voluntários entrará em contato com você!", $badge));
    }



    public function aprovarAdocoesEmail($permissaoId, $destinatario, $cpf, $adocaoId, $animalId)
    {

//        if (!empty($destinatario)) {
//            $mensagem = "Olá,\nAgradecemos imensamente pelo seu interesse em adotar um de nossos animais.\nO seu pedido de adoção foi recebido com sucesso e está agora em fase de análise pela equipe da Barthô - Proteção Animal.\nEste é um passo importante no processo de adoção, e estamos dedicados a garantir que cada animal encontre o lar amoroso que merece. Nossa equipe especializada está revisando cuidadosamente todas as informações fornecidas.\nEm breve, você receberá mais informações detalhadas via e-mail. Enquanto isso, se tiver alguma dúvida ou precisar de mais informações, não hesite em entrar em contato conosco.";
//
//            $mensagem = nl2br($mensagem);
//
//            $notificacao_destinatario = [
//                'body' => $mensagem
//            ];
//
//            Mail::to($destinatario)->send(SendMail::notificaAdocoesAnaliseEmail($notificacao_destinatario));
//        }

        $permissao = Permissao::find($permissaoId);

        if ($permissao) {
            $usuarios = $permissao->users()->get(['users.name', 'users.email']);

            $animal = Animal::findOrFail($animalId);
            $animalName = $animal->nome; // Nome do animal
            $applicationId =  $adocaoId; // ID da candidatura

            // Verifica se o CPF está na lista negra
            $listaNegra = ListaNegra::where('cpf', $cpf)->first();

            $cpf_na_lista_negra = false;
            if ($listaNegra) {
                $cpf_na_lista_negra = true;
            }

            // Constrói a mensagem
            $mensagem = "Olá!\n\n" .
                "Foi registrada uma nova Candidatura de Adoção para o animal <strong>$animalName</strong>.\n\n" .
                "Clique no link abaixo para analisar o Formulário e dar sequência no processo de adoção.\n\n" .
                "<strong>LEMBRE-SE:</strong> caso designe a responsabilidade deste processo para você, não se esqueça de alterar a situação da Candidatura para <strong>Em Processo de Adoção</strong>.\n\n" .
                "Avise também o Time de Adoções para que todos possam acompanhar os processos em andamento!";

            // Adiciona o índice 'cpf_na_lista_negra' ao array $data, se necessário
            $data = [
                'subject' => "ATENÇÃO! Nova Candidatura de Adoção Registrada ($applicationId - Animal: $animalName)",
                'body' => $mensagem,
                'adocaoId' => $adocaoId
            ];

            if ($cpf_na_lista_negra) {
                $data['cpf_na_lista_negra'] = $cpf;
            }

            foreach ($usuarios as $usuario) {
                Mail::to($usuario->email)->send(SendMail::analiseAdocoesEmail($data));
            }
        }
    }

}
