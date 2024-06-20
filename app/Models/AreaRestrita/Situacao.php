<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Situacao extends Model
{
    use HasFactory;

    protected $table = 'situacoes';

    protected $fillable = [
        'situacao',
        'cor'
    ];

    const SITUACAO_EM_ANALISE = 1;
    const SITUACAO_REPROVADO = 2;
    const SITUACAO_APROVADO = 3;
    const SITUACAO_CONCLUIDO = 4;
    const SITUACAO_CANCELADO = 5;
}
