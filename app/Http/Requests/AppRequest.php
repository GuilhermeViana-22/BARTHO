<?php

namespace App\Http\Requests;

use App\Helpers\Retorno;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AppRequest extends FormRequest
{
    public $permissoes = [];

    /**
     * Método que faz a validação
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $usuario = Auth::user();

        if(empty($this->permissoes))
        {
            return true;
        }

        /// verifica se tem a permissão do super
        if(in_array('super.todas', $usuario->permissoes_lista )){
            return true;
        }

        foreach ($this->permissoes as $permissao) {
            if( in_array(str_replace(' ', '', $permissao), $usuario->permissoes_lista ) )
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Método que faz a validação
     *
     * @return void
     */
    protected function failedAuthorization()
    {
        abort(Retorno::redirecionaErro(route('arearestrita'),'Você não está autorizado a realizar esta ação.'));
    }
}
