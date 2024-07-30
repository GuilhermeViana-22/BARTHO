<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Adocoes\AdocoesRequest;
use App\Http\Requests\AreaRestrita\Adocoes\AprovarModalRequest;
use App\Http\Requests\AreaRestrita\Adocoes\AprovarRequest;
use App\Http\Requests\AreaRestrita\Adocoes\ReprovarRequest;
use App\Http\Requests\AreaRestrita\Adocoes\VisualizarRequest;
use App\Mail\SendMail;
use App\Models\AreaRestrita\Adocao;
use App\Models\AreaRestrita\Situacao;
use App\Models\AreaRestrita\TipoAnimal;
use App\Models\User;
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
    public function index(AdocoesRequest $request)
    {
        // Busca o tipo de animal selecionado
        $tipo = TipoAnimal::findOrFail($request->get('tipo_id'));

        // Obtém todos os tipos de animais
        $tipos_animais = TipoAnimal::all();

        // Obtém a sessão atual
        $session = Session::get(self::SESSION_INDEX);

        // Obtém todas as situações
        $situacoes = Situacao::all();

        // Faz a busca com carregamento antecipado dos relacionamentos
        $adocoes = Adocao::query()
            ->with(['animal', 'situacao']) // Carrega os relacionamentos necessários
            ->where('tipo_animal_id', $request->get('tipo_id'))
            ->whereNull('deleted_at'); // Adiciona a condição para verificar soft deletes

        // Aplica os filtros conforme as condições da sessão
        if (!empty($session['situacao_id'])) {
            $adocoes->where('situacao_id', $session['situacao_id']);
        }

        if (!empty($session['responsavel_aprovacao'])) {
            $adocoes->where('responsavel_aprovacao', 'LIKE', '%'.$session['responsavel_aprovacao'].'%');
        }

        // Pagina os resultados
        $adocoes = $adocoes->paginate();

        // Retorna a view com os dados
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

    public function aprovarModal( AprovarModalRequest $request, $id )
    {
        try {
            $adocao = Adocao::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa adoção.');
        }

        return view('Arearestrita.Adocoes.aprovar_modal', compact('adocao'));
    }

    public function aprovar( AprovarRequest $request ): \Illuminate\Http\RedirectResponse
    {
        try {
            $adocao = Adocao::findOrFail($request->get('id'));

        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar essa adoção.');
        }

        /// muda a situação da adoção e adiciona a observação
        $adocao->situacao_id = Situacao::SITUACAO_CONCLUIDO;
        $adocao->observacao = $request->get('observacao');
        $adocao->responsavel_aprovacao = $request->get('responsavel_aprovacao');

        DB::beginTransaction();

        /// salvar os anexos de aprovação
        if($request->exists('termo_adocao') && !empty($request->file('termo_adocao'))) {
            try {
                /// adiciona o anexo
                $adocao->termo_adocao = StorageHelper::salvar($request->file('termo_adocao'), Adocao::STORAGE_PATH . $adocao->id);

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações do anexo.");
            }
        }

        if($request->exists('documento_identidade') && !empty($request->file('documento_identidade'))) {
            try {
                /// adiciona o anexo
                $adocao->documento_identidade = StorageHelper::salvar($request->file('documento_identidade'), Adocao::STORAGE_PATH . $adocao->id);

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações do anexo.");
            }
        }

        if($request->exists('comprovante_endereco') && !empty($request->file('comprovante_endereco'))) {
            try {
                /// adiciona o anexo
                $adocao->comprovante_endereco = StorageHelper::salvar($request->file('comprovante_endereco'), Adocao::STORAGE_PATH . $adocao->id);

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações do anexo.");
            }
        }

        if($request->exists('foto_adocao') && !empty($request->file('foto_adocao'))) {
            try {
                /// adiciona o anexo
                $adocao->foto_adocao = StorageHelper::salvar($request->file('foto_adocao'), Adocao::STORAGE_PATH . $adocao->id);

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações do anexo.");
            }
        }

        /// salva as informações do anexo
        try {
            $adocao->save();

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        /// recupera o animal escolhido da adoção
        $animal = $adocao->animal;
        $animal->adotado = 1;

        try {
            $animal->save();

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
