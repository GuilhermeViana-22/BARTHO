<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdocoesSelecoes extends Model
{
    use HasFactory;

    protected $table = 'adocoes_selecoes';

    protected $fillable = [
        'pergunta_id',
        'selecao',
    ];

    public function pergunta()
    {
        return $this->belongsTo(AdocoesPerguntas::class, 'pergunta_id');
    }
}
