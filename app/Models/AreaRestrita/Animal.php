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
        'descricao'
    ];

    public const STORAGE_PATH = "arearestrita/animais/";

    public static function imagem_url( $id, $file )
    {
        return asset('storage/'. self::STORAGE_PATH . $id . "/" . $file );
    }

    public function tipo()
    {
        return $this->belongsTo(TipoAnimal::class);
    }
}
