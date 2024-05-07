<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use Illuminate\Foundation\Http\FormRequest;

class SalvarRequest extends FormRequest
{
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
            'imagem' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
