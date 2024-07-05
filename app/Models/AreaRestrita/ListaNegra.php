<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaNegra extends Model
{
    use HasFactory;

    protected $table = 'lista_negras';

    protected $fillable = [
        'nome',
        'cpf',
    ];
}
