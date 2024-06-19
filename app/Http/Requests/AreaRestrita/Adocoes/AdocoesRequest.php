<?php

namespace App\Http\Requests\AreaRestrita\Adocoes;

use App\Http\Requests\AppRequest;

class AdocoesRequest extends AppRequest
{

    public $permissoes = [
        'adocoes.visualizar',
        'adocoes.gerenciar',
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
