<?php

namespace App\Http\Requests\AreaRestrita\Usuarios;

use App\Http\Requests\AppRequest;

class UsuariosRequest extends AppRequest
{

    public $permissoes = [
        'usuarios.visualizar',
        'usuarios.gerenciar',
        'permissoes.gerenciar'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
