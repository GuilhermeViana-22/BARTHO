<?php

namespace App\Http\Requests\AreaRestrita\AdocoesPerguntas;

use App\Http\Requests\AppRequest;

class AdocoesPerguntasRequest extends AppRequest
{

    public $permissoes = [
        'configuracoes.perguntas.visualizar',
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
