<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use App\Http\Requests\AppRequest;

class AnimaisRequest extends AppRequest
{

    public $permissoes = [
        'animais.visualizar',
        'animais.gerenciar'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_id' => 'required|integer',
            'page' => 'nullable|int'
        ];
    }
}
