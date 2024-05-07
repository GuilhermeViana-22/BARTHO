<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use Illuminate\Foundation\Http\FormRequest;

class ExcluirRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer'
        ];
    }
}
