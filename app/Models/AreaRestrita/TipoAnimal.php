<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAnimal extends Model
{
    use HasFactory;

    protected $table = 'tipos_animais';

    CONST TIPO_CACHORRO = 1;
    CONST TIPO_GATO = 2;
}
