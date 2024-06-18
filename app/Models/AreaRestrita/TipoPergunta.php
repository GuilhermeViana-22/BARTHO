<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPergunta extends Model
{
    use HasFactory;

    protected $table = 'tipos_perguntas';

    protected $fillable = [
        'tipo',
    ];
}
