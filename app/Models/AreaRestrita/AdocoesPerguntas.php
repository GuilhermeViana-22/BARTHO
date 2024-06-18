<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdocoesPerguntas extends Model
{
    use HasFactory;

    protected $table = 'adocoes_perguntas';

    protected $fillable = [
        'tipo_pergunta_id',
        'pergunta',
        'opcional',
        'ativo',
    ];

    public function tipoPergunta()
    {
        return $this->belongsTo(TiposPerguntas::class);
    }
}
