<?php

namespace App\Http\Requests\AreaRestrita\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class SalvarAlteracaoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|int',
            'name' => 'required|max:255',
            'ativo' => 'nullable|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
