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
        'tipo_porte_id',
        'especial',
        'adotado',
        'castrado',
        'vacinado',
        'sexo_id',
        'descricao'
    ];

    public const STORAGE_PATH = "arearestrita/animais/";

    public static function imagem_url( $id, $file )
    {
        if(empty($file)){
            return null;
        }

        return asset('storage/'. self::STORAGE_PATH . $id . "/" . $file );
    }

    public function tipo()
    {
        return $this->belongsTo(TipoAnimal::class);
    }

    public function porte()
    {
        return $this->belongsTo(TipoPorte::class, 'tipo_porte_id');
    }
}
