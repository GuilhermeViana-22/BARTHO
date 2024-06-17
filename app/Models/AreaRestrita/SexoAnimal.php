<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SexoAnimal extends Model
{
    use HasFactory;

    protected $table = 'sexo_animais';

    CONST SEXO_MACHO = 1;
    CONST SEXO_FEMEA = 2;
}
