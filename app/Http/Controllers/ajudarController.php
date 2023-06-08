<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajudarController extends Controller
{
    public function index()
    {
        return view('Components.Ajudar.index');
    }
}
