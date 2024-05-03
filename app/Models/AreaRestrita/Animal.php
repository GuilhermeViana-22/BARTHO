<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';

    protected $fillable = [
        'nome',
        'tipo_id',
        'adotado',
        'decricao'
    ];

    public const STORAGE_PATH = "arearestrita/animais/";

    public function tipo()
    {
        return $this->belongsTo(TipoAnimal::class);
    }
}
