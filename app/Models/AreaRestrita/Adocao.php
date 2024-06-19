<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adocao extends Model
{
    use HasFactory;

    protected $table = 'adocoes';

    protected $fillable = [
        'nome',
        'telefone',
        'idade',
        'cpf',
        'tipo_animal_id',
        'animal_id',
    ];

    public function animal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function tipo_animal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TipoAnimal::class, 'tipo_animal_id');
    }

    public function situacao(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Situacao::class, 'situacao_id');
    }

    public function perguntas(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(AdocaoPergunta::class, AdocaoResposta::class);
    }

    public function respostas(): HasMany
    {
        return $this->hasMany(AdocaoResposta::class);
    }
}
