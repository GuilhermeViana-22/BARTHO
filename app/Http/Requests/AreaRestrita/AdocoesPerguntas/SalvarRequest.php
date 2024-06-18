<?php

namespace App\Http\Requests\AreaRestrita\AdocoesPerguntas;

use App\Http\Requests\AppRequest;

class SalvarRequest extends AppRequest
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
            'pergunta' => 'string|required|max:500',
            'tipo_pergunta_id' => 'integer|required',
            'opcional' => 'boolean|required',
            'ativo' => 'boolean|required',
        ];
    }

    public function messages()
    {
        return [
            'tipo_pergunta_id.required' => 'O tipo de resposta deve ser informado!',
            'tipo_pergunta_id.integer' => 'O tipo de resposta deve ser informado!',
        ];
    }
}
