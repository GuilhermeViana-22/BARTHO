<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\Permissao;
use Illuminate\Database\Seeder;

class PermissoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * SUPER
         */

        /// cria a primeira permissão que se refere a TODAS do super usuário
        Permissao::create([
            'nome' => 'Todas',
            'path' => 'super.todas',
            'modulo_id' => 1
        ]);

        /**
         * CACHORROS
         */

        /// a restante cria as permissões do projeto
        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'cachorros.visualizar',
            'modulo_id' => 2
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'cachorros.gerenciar',
            'modulo_id' => 2
        ]);

        /**
         * GATOS
         */

        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'gatos.visualizar',
            'modulo_id' => 3
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'gatos.gerenciar',
            'modulo_id' => 3
        ]);

        /**
         * USUÁRIOS
         */

        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'usuarios.visualizar',
            'modulo_id' => 4
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'usuarios.gerenciar',
            'modulo_id' => 4
        ]);


        /**
         * PERMISSÕES
         */

        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'permissoes.visualizar',
            'modulo_id' => 5
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'permissoes.gerenciar',
            'modulo_id' => 5
        ]);
    }
}
