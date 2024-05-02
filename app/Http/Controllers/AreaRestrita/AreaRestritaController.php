<?php

namespace App\Http\Controllers\AreaRestrita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaRestritaController extends Controller
{

    public function index()
    {
        return view('Arearestrita.index');
    }

    public function deslogar()
    {
        Auth::logout();

        return redirect('/');
    }
}
