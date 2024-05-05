<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRestrita\Usuarios\UsuariosRequest;
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
     * Método que mostra todos os animais
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
        if(!empty($session['nome'])){
            $usuarios->where('nome', 'LIKE', '%'.$session['nome'].'%');
        }

        /// faz o filtro
        if(!empty($session['email'])){
            $usuarios->where('email', '%'.$session['email'].'%');
        }

        $usuarios = $usuarios->paginate();

        return view('Arearestrita.Usuarios.index', compact('usuarios','session'));
    }

    public function visualizar()
    {

    }

    public function incluir()
    {

    }

    public function salvar()
    {

    }

    public function excluir()
    {

    }

    public function alterar()
    {

    }

    public function salvarAlteracao(){

    }
}
