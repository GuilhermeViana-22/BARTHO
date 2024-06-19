<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdocaoPergunta extends Model
{
    use HasFactory;

    protected $table = 'adocoes_perguntas';

    protected $fillable = [
        'tipo_pergunta_id',
        'pergunta',
        'opcional',
        'ativo',
    ];

    public function tipo_pergunta()
    {
        return $this->belongsTo(TipoPergunta::class);
    }

    public function alternativas()
    {
        return $this->hasMany(AdocaoSelecao::class, 'pergunta_id');
    }
}
