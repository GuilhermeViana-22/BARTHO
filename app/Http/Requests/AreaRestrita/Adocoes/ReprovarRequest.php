<?php

namespace App\Http\Requests\AreaRestrita\Adocoes;

use App\Http\Requests\AppRequest;

class ReprovarRequest extends AppRequest
{

    public $permissoes = [
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
            //
        ];
    }
}
