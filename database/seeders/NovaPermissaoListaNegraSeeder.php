<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\Modulo;
use App\Models\AreaRestrita\Permissao;
use Illuminate\Database\Seeder;

class NovaPermissaoListaNegraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Novo módulo
         */
        Modulo::create([
            'nome' => 'Lista negra',
        ]);


        /**
         * LISTA NEGRA
         */
        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'configuracoes.listanegra.visualizar',
            'modulo_id' => 7
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'configuracoes.listanegra.gerenciar',
            'modulo_id' => 7
        ]);
    }
}
