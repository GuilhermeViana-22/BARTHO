<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposPerguntas extends Model
{
    use HasFactory;

    protected $table = 'tipos_perguntas';

    protected $fillable = [
        'tipo',
    ];
}
