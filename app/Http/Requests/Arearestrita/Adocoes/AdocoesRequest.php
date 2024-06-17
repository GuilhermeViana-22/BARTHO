<?php

namespace App\Http\Requests\Arearestrita\Adocoes;

use App\Http\Requests\AppRequest;

class AdocoesRequest extends AppRequest
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
