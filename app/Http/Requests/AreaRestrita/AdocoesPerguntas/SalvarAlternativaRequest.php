<?php

namespace App\Http\Requests\AreaRestrita\AdocoesPerguntas;

use App\Http\Requests\AppRequest;

class SalvarAlternativaRequest extends AppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pergunta_id' => 'required|integer',
            'selecao' => 'string|nullable',
        ];
    }
}
