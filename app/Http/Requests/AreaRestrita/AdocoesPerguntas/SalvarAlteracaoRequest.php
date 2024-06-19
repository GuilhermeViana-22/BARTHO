<?php

namespace App\Http\Requests\AreaRestrita\AdocoesPerguntas;

use App\Http\Requests\AppRequest;

class SalvarAlteracaoRequest extends AppRequest
{

    public $permissoes = [
        'configuracoes.perguntas.gerenciar'
    ];

    public function prepareForValidation()
    {
        return $this->merge([
            'opcional' => (bool) $this->opcional,
            'ativo' => (bool) $this->ativo
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'opcional' => 'boolean|required',
            'ativo' => 'boolean|required',
        ];
    }
}
