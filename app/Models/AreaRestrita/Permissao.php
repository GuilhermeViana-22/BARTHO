<?php

namespace App\Models\AreaRestrita;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissoes';

    const ADOCOES_GERENCIAR = 8;

    protected $fillable = [
        'nome',
        'modulo_id',
    ];

    public function modulo() : BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            UserPermissao::class,
            'permissao_id', // Chave estrangeira de Permissao em UserPermissao
            'id',           // Chave primária de User
            'id',           // Chave primária de Permissao
            'user_id'       // Chave estrangeira de User em UserPermissao
        );
    }
}
