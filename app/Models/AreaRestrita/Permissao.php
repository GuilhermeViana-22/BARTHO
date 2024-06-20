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

    protected $fillable = [
        'nome',
        'modulo_id',
    ];

    public function modulo() : BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }

    public function usuarios()
    {
        return $this->hasManyThrough(
            User::class,
            UserPermissao::class,
            'id',
            'id',
        );
    }
}
