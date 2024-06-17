<?php

namespace App\Models;

use App\Models\AreaRestrita\Permissao;
use App\Models\AreaRestrita\UserPermissao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property array $permissoes_lista
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const STORAGE_PATH = "arearestrita/usuarios/";

    public function permissoes()
    {
        return $this->hasManyThrough(
            Permissao::class,
            UserPermissao::class,
            'user_id',
            'id',
            'id',
            'permissao_id'
        );
    }

    public function users_permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'users_permissoes', 'user_id', 'permissao_id');
    }

    /**
     * Método que retorna todas as permissões em lista do usuário
     *
     * @return array
     */
    public function getPermissoesListaAttribute(): array
    {
        $permissoes = $this->permissoes;
        $permissao_lista = [];

        foreach ($permissoes as $permissao) {
            array_push($permissao_lista, $permissao->path);
        }

        return $permissao_lista;
    }

    public static function imagem_url( $id, $file )
    {
        if(empty($file)){
            return null;
        }

        return asset('storage/'. self::STORAGE_PATH . $id . "/" . $file );
    }
}
