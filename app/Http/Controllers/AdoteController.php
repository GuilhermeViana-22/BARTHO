<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoteController extends Controller
{
    public function index(){
        return view('Components.Adote.index');
    }
}
