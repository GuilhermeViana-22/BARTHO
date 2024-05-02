<?php

namespace App\Http\Requests\AreaRestrita\Animais;

use Illuminate\Foundation\Http\FormRequest;

class AnimaisRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_id' => 'required|integer',
            'page' => 'nullable|int'
        ];
    }
}
