<?php

namespace App\Http\Requests\AreaRestrita\AdocoesPerguntas;

use App\Http\Requests\AppRequest;

class AlterarModalRequest extends AppRequest
{

    public $permissoes = [
        'configuracoes.perguntas.gerenciar'
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
