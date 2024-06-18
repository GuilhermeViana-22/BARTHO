<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use App\Http\Requests\AppRequest;

class SalvarRequest extends AppRequest
{
    public $permissoes = [
        'animais.gerenciar'
    ];

    public function prepareForValidation()
    {
        return $this->merge([
            'adotado' => (bool) $this->adotado
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
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'tipo_id' => 'required|integer',
            'adotado' => 'nullable',
        ];
    }

    public function messages(){
        return [
            'tipo_id.required' => 'O campo espécie do animal é obrigatorio',
            'tipo_id.integer' => 'O campo espécie do animal deve ser selecionado.',
        ];
    }
}
