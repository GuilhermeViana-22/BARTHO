<?php

namespace App\Http\Requests\AreaRestrita\Usuarios;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SalvarRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => ['required', 'string', Password::default(), 'confirmed'],
            'password_confirmation' => 'required|max:255',
            'ativo' => 'nullable|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
