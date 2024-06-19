<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Helpers\Retorno;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Animais\AlterarRequest;
use App\Http\Requests\AreaRestrita\Animais\AnimaisRequest;
use App\Http\Requests\AreaRestrita\Animais\ExcluirRequest;
use App\Http\Requests\AreaRestrita\Animais\IncluirRequest;
use App\Http\Requests\AreaRestrita\Animais\SalvarAlteracaoRequest;
use App\Http\Requests\AreaRestrita\Animais\SalvarRequest;
use App\Http\Requests\AreaRestrita\Animais\VisualizarRequest;
use App\Models\AreaRestrita\Animal;
use App\Models\AreaRestrita\SexoAnimal;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AnimaisController extends Controller
{
    const SESSION_INDEX = "SESSION_INDEX_ANIMAIS";

    /**
     * Método que mostra todos os animais
     *
     * @param AnimaisRequest $request
     * @return Application|Factory|View
     */
    public function index(AnimaisRequest $request)
    {
        $tipo = TipoAnimal::findOrFail($request->get('tipo_id'));

        /// tipos animais
        $tipos_animais = TipoAnimal::all();
        $session = Session::get(self::SESSION_INDEX);

        /// faz a busca
        $animais = Animal::query();
        $animais->where('tipo_id', $request->get('tipo_id'));

        /// faz o filtro
        if (!empty($session['nome'])) {
            $animais->where('nome', 'LIKE', '%' . $session['nome'] . '%');
        }

        /// faz o filtro
        if (!empty($session['adotado'])) {
            $animais->where('adotado', ($session['adotado'] === "on" ? true : false));
        }

        $animais = $animais->paginate();

        return view('Arearestrita.Animais.index', compact('animais', 'tipo', 'tipos_animais', 'session'));
    }

    /**
     * Método para visualização de um animal
     *
     * @param Request $request
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function visualizar(VisualizarRequest $request, $id)
    {
        $tipos_animais = TipoAnimal::all();
        $sexos_animais = SexoAnimal::all();
        try {
            $animal = Animal::findOrFail($id);
        } catch (\Throwable $e) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        return view('Arearestrita.Animais.visualizar', compact('tipos_animais', 'animal', 'sexos_animais'));
    }

    /**
     * Método para inclusão de um novo animal
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function incluir(IncluirRequest $request)
    {
        $tipos_animais = TipoAnimal::all();
        $sexos_animais = SexoAnimal::all();
        return view('Arearestrita.Animais.incluir', compact('tipos_animais', 'sexos_animais'));
    }

    /**
     * Método que realiza o salvamento de um novo animal
     *
     * @param SalvarRequest $request
     * @return RedirectResponse
     */
    public function salvar(SalvarRequest $request)
    {
        // Transform the 'adotado' value from 'on' to 1, and ensure it's 0 if not set
        $requestData = $request->all();
        $requestData['adotado'] = isset($requestData['adotado']) ? 1 : 0;
        $requestData['castrado'] = isset($requestData['castrado']) ? 1 : 0;
        $requestData['vacinado'] = isset($requestData['vacinado']) ? 1 : 0;

        // Create a new Animal instance and fill it with request data
        $animal = new Animal();
        $animal->fill($requestData);

        DB::beginTransaction();

        try {
            // Save animal data first
            $animal->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        try {
            // Save images and update the animal record
            $imagePaths = [];
            for ($i = 1; $i <= 3; $i++) {
                $imageField = 'imagem' . $i;
                if ($request->hasFile($imageField)) {
                    $imagePaths[$imageField] = StorageHelper::salvar($request->file($imageField), Animal::STORAGE_PATH . $animal->id);
                }
            }

            // Update animal record with image paths
            $animal->imagem1 = $imagePaths['imagem1'] ?? null;
            $animal->imagem2 = $imagePaths['imagem2'] ?? null;
            $animal->imagem3 = $imagePaths['imagem3'] ?? null;
            $animal->save();

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações da imagem." . $e->getMessage());
        }

        DB::commit();

        return Retorno::deVoltaSucesso("Animal incluído com sucesso!");
    }

    /**
     * Método que realiza a exclusão de um animal
     *
     * @param ExcluirRequest $request
     * @return RedirectResponse
     */
    public function excluir(ExcluirRequest $request)
    {
        try {
            $animal = Animal::findOrFail($request->get('id'));
        } catch (\Throwable $e) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        try {
            $animal->deleteOrFail();
        } catch (\Throwable $e) {
            return Retorno::deVoltaErro("Houve um erro ao tentar excluir as informações.");
        }

        return Retorno::deVoltaSucesso("Animal excluído com sucesso!");
    }

    /**
     * Método que mostra a tela de alteração de um animal
     *
     * @param Request $request
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function alterar(AlterarRequest $request, $id)
    {

        try {
            $animal = Animal::findOrFail($id);
        } catch (\Throwable $e) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        $tipos_animais = TipoAnimal::all();
        $sexos_animais = SexoAnimal::all();
        return view('Arearestrita.Animais.alterar', compact('tipos_animais', 'animal', 'sexos_animais'));
    }

    /**
     * Método que realiza o salvamento dos dados alterados de um animal
     *
     * @param SalvarAlteracaoRequest $request
     * @return RedirectResponse
     */
    public function salvarAlteracao(SalvarAlteracaoRequest $request)
    {
        try {
            // Busca o animal pelo ID
            $animal = Animal::findOrFail($request->get('id'));
        } catch (\Throwable $e) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        // Validar os dados recebidos na requisição
        $validatedData = $request->validated();

        DB::beginTransaction();

        // Atualizar os dados básicos do animal
        $animal->nome = $validatedData['nome'];
        $animal->tipo_id = $validatedData['tipo_id'];
        $animal->sexo_id = $validatedData['sexo_id'];
        $animal->descricao = $validatedData['descricao'];
        $animal->castrado = isset($validatedData['castrado']) ? 1 : 0;
        $animal->vacinado = isset($validatedData['vacinado']) ? 1 : 0;
        $animal->adotado = isset($validatedData['adotado']) ? 1 : 0;

        // Deletar imagens antigas se houver novas imagens
        $imagePaths = [];
        for ($i = 1; $i <= 3; $i++) {
            $imageField = 'imagem' . $i;
            if ($request->hasFile($imageField)) {
                // Salvar nova imagem e obter o caminho
                $imagePaths[$imageField] = StorageHelper::salvar($request->file($imageField), Animal::STORAGE_PATH . $animal->id);

                // Deletar imagem antiga, se existir
                if (!empty($animal->$imageField)) {
                    try {
                        StorageHelper::deletar($animal->$imageField);
                    } catch (\Throwable $e) {
                        DB::rollBack();
                        return Retorno::deVoltaErro("Houve um erro ao tentar deletar a imagem antiga.");
                    }
                }
            }
        }

        // Atualizar animal com novos caminhos de imagens
        $animal->imagem1 = $imagePaths['imagem1'] ?? $animal->imagem1;
        $animal->imagem2 = $imagePaths['imagem2'] ?? $animal->imagem2;
        $animal->imagem3 = $imagePaths['imagem3'] ?? $animal->imagem3;

        try {
            $animal->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        DB::commit();
        return Retorno::deVoltaSucesso("Animal alterado com sucesso!");
    }
}
