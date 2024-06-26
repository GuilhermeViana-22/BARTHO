<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Actions\Fortify\CreateNewUser;
use App\Helpers\Retorno;
use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Usuarios\AlterarRequest;
use App\Http\Requests\AreaRestrita\Usuarios\AtivarRequest;
use App\Http\Requests\AreaRestrita\Usuarios\ConfigurarPermissoesModalRequest;
use App\Http\Requests\AreaRestrita\Usuarios\ExcluirRequest;
use App\Http\Requests\AreaRestrita\Usuarios\IncluirRequest;
use App\Http\Requests\AreaRestrita\Usuarios\SalvarAlteracaoRequest;
use App\Http\Requests\AreaRestrita\Usuarios\SalvarPermissoesRequest;
use App\Http\Requests\AreaRestrita\Usuarios\SalvarRequest;
use App\Http\Requests\AreaRestrita\Usuarios\UsuariosRequest;
use App\Http\Requests\AreaRestrita\Usuarios\VisualizarRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{

    CONST SESSION_INDEX = "SESSION_INDEX_USUARIOS";

    /**
     * Método que mostra todos os usuários
     *
     * @param UsuariosRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function index( UsuariosRequest $request )
    {
        $session = Session::get(self::SESSION_INDEX);

        /// faz a busca
        $usuarios = User::query();

        /// faz o filtro
        if(!empty($session['name'])){
            $usuarios->where('name', 'LIKE', '%'.$session['name'].'%');
        }

        /// faz o filtro
        if(!empty($session['email'])){
            $usuarios->where('email', 'LIKE','%'.$session['email'].'%');
        }

        /// faz o filtro
        if(!empty($session['ativo'])){
            $usuarios->where('ativo', ($session['ativo'] === "on" ? true : false));
        }

        $usuarios = $usuarios->paginate();

        return view('Arearestrita.Usuarios.index', compact('usuarios','session'));
    }

    public function visualizar( VisualizarRequest $request, int $id )
    {
        try {
            $usuario = User::findOrFail($id);
        } catch ( \Exception $e ) {
            return Retorno::deVoltaFindOrFail('Não foi possível localizar esse usuário.');
        }

        return view('Arearestrita.Usuarios.visualizar', compact('usuario'));
    }

    public function incluir( IncluirRequest $request )
    {
        return view('Arearestrita.Usuarios.incluir');
    }

    public function salvar( SalvarRequest $request )
    {
        DB::beginTransaction();

        try {
            /// cria o usuário
            $create_user = new CreateNewUser();
            $usuario = $create_user->create( $request->validated() );

            /// ativa ou desativa ele
            $usuario->ativo = ($request->get('ativo') === "on" ? true : false);
            $usuario->save();

        } catch (\Throwable $e ){
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        /// se tiver a imagem do usuário
        if($request->exists('imagem') && !empty($request->file('imagem'))) {
            try {
                /// adiciona a imagem
                $usuario->imagem = StorageHelper::salvar($request->file('imagem'), User::STORAGE_PATH . $usuario->id);
                $usuario->save();

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações da imagem.");
            }
        }

        DB::commit();

        return Retorno::deVoltaSucesso("Usuário incluído com sucesso!");
    }

    public function excluir( ExcluirRequest $request )
    {
        try {
            $usuario = User::findOrFail($request->get('id'));
        } catch(\Throwable $e ){
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        try {
            $usuario->ativo = 0;
            $usuario->save();

        } catch(\Throwable $e ) {
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        return Retorno::deVoltaSucesso("Usuário inativado com sucesso!");
    }

    public function ativar( AtivarRequest $request )
    {
        try {
            $usuario = User::findOrFail($request->get('id'));
        } catch(\Throwable $e ){
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        try {
            $usuario->ativo = 1;
            $usuario->save();

        } catch(\Throwable $e ){
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        return Retorno::deVoltaSucesso("Usuário ativado com sucesso!");
    }

    public function alterar( AlterarRequest $request, int $id )
    {
        try {
            $usuario = User::findOrFail($id);
        } catch(\Throwable $e ){
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        return view('Arearestrita.Usuarios.alterar', compact('usuario'));
    }

    public function salvarAlteracao( SalvarAlteracaoRequest $request ){

        try {
            $usuario = User::findOrFail($request->get('id'));
        } catch(\Throwable $e ){
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        $usuario->fill($request->validated());
        $usuario->ativo = ($request->get('ativo') === "on" || $usuario->id == 1 ? true : false);

        DB::beginTransaction();

        /// se tiver a imagem do usuário
        if($request->exists('imagem') && !empty($request->file('imagem'))) {
            try {
                /// adiciona a imagem
                $usuario->imagem = StorageHelper::salvar($request->file('imagem'), User::STORAGE_PATH . $usuario->id);

            } catch (\Throwable $e) {
                DB::rollBack();
                return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações da imagem.");
            }
        }

        try {
            $usuario->save();

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.");
        }

        DB::commit();
        return Retorno::deVoltaSucesso("Alterações realizada com sucesso!");
    }

    public function configurarPermissoesModal(ConfigurarPermissoesModalRequest $request, $id )
    {
        try {
            $usuario = User::findOrFail($id);
        } catch ( \Throwable $e ) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        return view('Arearestrita.Usuarios.configurar_permissoes_modal', compact('usuario'));
    }

    public function salvarPermissoes( SalvarPermissoesRequest $request )
    {
        try {
            $usuario = User::findOrFail($request->get('usuario_id'));
        } catch ( \Throwable $e ) {
            return Retorno::deVoltaFindOrFail("Houve um erro ao tentar recuperar as informações.");
        }

        DB::beginTransaction();

        $permissoes = array_keys($request->get('permissoes') ?? []);

        try {
            $usuario->users_permissoes()->sync($permissoes);

        } catch (\Throwable $e) {
            DB::rollBack();
            return Retorno::deVoltaErro("Houve um erro ao tentar salvar as informações.".$e->getMessage());
        }

        DB::commit();
        return Retorno::deVoltaSucesso("Alterações realizada com sucesso!");
    }
}
