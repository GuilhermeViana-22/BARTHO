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
        'situacao_id',
        'tipo_animal_id',
        'animal_id',
        'cidade_id',
        'cidade_outro',
        'telefone',
        'idade',
        'cpf',
        'social',
        'bairro',
        'endereco',
        'is_presente',
        'tipo_casa',
        'restricoes_apartamento',
        'quantidade_adultos',
        'quantidade_animais',
        'janela_is_telada',
        'acesso_rua',
        'acesso_livre',
        'horas_sozinho',
        'responsavel_viagem',
        'gravidez_situacao',
        'medidas_alergia',
        'medidas_mudanca_casa',
        'circunstancias_abandono'
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
}
