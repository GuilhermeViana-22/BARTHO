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
            'adotado' => (bool) $this->adotado,
            'castrado' => (bool) $this->castrado,
            'vacinado' => (bool) $this->vacinado,
            'especial' => (bool) $this->especial
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
            'tipo_porte_id' => 'required|integer',
            'imagem1' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagem2' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagem3' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adotado' => 'nullable',
            'castrado' => 'nullable',
            'vacinado' => 'nullable',
            'especial' => 'nullable',
        ];
    }

    public function messages(){
        return [
            'tipo_id.required' => 'O campo espécie do animal é obrigatorio',
            'tipo_id.integer' => 'O campo espécie do animal deve ser selecionado.',
            'tipo_porte_id.required' => 'O campo tipo porte do animal é obrigatorio',
        ];
    }
}
