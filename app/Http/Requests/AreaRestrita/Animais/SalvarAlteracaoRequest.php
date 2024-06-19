<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use App\Http\Requests\AppRequest;

class SalvarAlteracaoRequest extends AppRequest
{
    public $permissoes = [
        'animais.gerenciar'
    ];

    public function prepareForValidation()
    {
        return $this->merge([
            'adotado' => (bool) $this->adotado,
            'castrado' => (bool) $this->castrado,
            'vacinado' => (bool) $this->vacinado
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
            'tipo_id' => 'required',
            'sexo_id' => 'required',
            'castrado' => 'nullable',
            'vacinado' => 'nullable',
            'adotado' => 'nullable',
            'imagem1' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagem2' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagem3' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }

    public function messages(){
        return [
            'tipo_id.required' => 'O campo espécie do animal é obrigatório',
            'sexo_id.required' => 'O campo sexo do animal é obrigatório',


        ];
    }
}
