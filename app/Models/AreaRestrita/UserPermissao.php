<?php

namespace App\Models\AreaRestrita;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPermissao extends Model
{
    use HasFactory;

    protected $table = 'users_permissoes';

    protected $fillable = [
        'user_id',
        'permissao_id',
    ];

    public function permissao() : BelongsTo
    {
        return $this->belongsTo(Permissao::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
