<?php

namespace App\Http\Requests\AreaRestrita\Usuarios;

use App\Http\Requests\AppRequest;

class SalvarPermissoesRequest extends AppRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'usuario_id' => 'required|integer|exists:users,id',
            'permissoes' => 'nullable|array'
        ];
    }
}
