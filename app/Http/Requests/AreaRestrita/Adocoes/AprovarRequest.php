<?php

namespace App\Http\Requests\AreaRestrita\Adocoes;

use App\Http\Requests\AppRequest;

class AprovarRequest extends AppRequest
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
            'id' => 'required|integer',
            'termo_adocao' => 'required',
            'documento_identidade' => 'required',
            'comprovante_endereco' => 'required',
            'responsavel_aprovacao' => 'required|string',
            'foto_adocao' => 'nullable',
            'observacao' => 'nullable|string|max:500',
        ];
    }
}
