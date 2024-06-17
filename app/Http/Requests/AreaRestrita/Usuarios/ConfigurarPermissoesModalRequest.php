<?php

namespace App\Http\Requests\AreaRestrita\Usuarios;

use App\Http\Requests\AppRequest;

class ConfigurarPermissoesModalRequest extends AppRequest
{

    public $permissoes = [
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
