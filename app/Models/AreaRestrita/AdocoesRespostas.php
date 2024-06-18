<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdocoesRespostas extends Model
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

    public function adocaoPergunta()
    {
        return $this->belongsTo(AdocoesPerguntas::class, 'adocao_pergunta_id');
    }

    public function adocaoSelecao()
    {
        return $this->belongsTo(AdocoesSelecoes::class, 'adocao_selecao_id');
    }
}
