<?php

namespace App\Http\Requests\AreaRestrita\Usuarios;

use App\Http\Requests\AppRequest;
use Illuminate\Foundation\Http\FormRequest;

class IncluirRequest extends AppRequest
{

    public $permissoes = [
        'usuarios.gerenciar'
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
