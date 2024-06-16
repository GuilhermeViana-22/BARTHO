<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use App\Http\Requests\AppRequest;

class IncluirRequest extends AppRequest
{
    public $permissoes = [
        'animais.gerenciar'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
