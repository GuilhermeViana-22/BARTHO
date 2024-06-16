<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Diretiva personalizada de permissão
        Blade::if('permissao', function ($permissoes) {
            $usuario = Auth::user();
            $permissoes = explode(',', $permissoes);

            /// verifica se tem a permissão do super
            if(in_array('super.todas', $usuario->permissoes_lista )){
                return true;
            }

            foreach ($permissoes as $permissao) {
                if( in_array(str_replace(' ', '', $permissao), $usuario->permissoes_lista ) )
                {
                    return true;
                }
            }

            return false;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
