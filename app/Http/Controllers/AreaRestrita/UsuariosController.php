<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Usuarios\AlterarRequest;
use App\Http\Requests\AreaRestrita\Usuarios\ExcluirRequest;
use App\Http\Requests\AreaRestrita\Usuarios\IncluirRequest;
use App\Http\Requests\AreaRestrita\Usuarios\SalvarAlteracaoRequest;
use App\Http\Requests\AreaRestrita\Usuarios\SalvarRequest;
use App\Http\Requests\AreaRestrita\Usuarios\UsuariosRequest;
use App\Http\Requests\AreaRestrita\Usuarios\VisualizarRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{

    CONST SESSION_INDEX = "SESSION_INDEX_ANIMAIS";

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

        $usuarios = $usuarios->paginate();

        return view('Arearestrita.Usuarios.index', compact('usuarios','session'));
    }

    public function visualizar( VisualizarRequest $request )
    {

    }

    public function incluir( IncluirRequest $request )
    {

    }

    public function salvar( SalvarRequest $request )
    {

    }

    public function excluir( ExcluirRequest $request )
    {

    }

    public function alterar( AlterarRequest $request )
    {

    }

    public function salvarAlteracao( SalvarAlteracaoRequest $request ){

    }
}
