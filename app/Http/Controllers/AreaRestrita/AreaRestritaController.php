<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaRestritaController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        return view('Arearestrita.index', compact('usuario'));
    }

    public function deslogar()
    {
        Auth::logout();

        return redirect('/');
    }
}
