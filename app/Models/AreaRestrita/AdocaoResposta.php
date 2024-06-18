<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdocaoResposta extends Model
{
    use HasFactory;

    protected $table = 'adocoes_respostas';

    protected $fillable = [
        'adocao_id',
        'adocao_pergunta_id',
        'adocao_selecao_id',
        'resposta',
    ];

    public function adocao()
    {
        return $this->belongsTo(Adocao::class);
    }

    public function adocao_pergunta()
    {
        return $this->belongsTo(AdocaoPergunta::class, 'adocao_pergunta_id');
    }

    public function adocao_selecao()
    {
        return $this->belongsTo(AdocaoSelecao::class, 'adocao_selecao_id');
    }
}
