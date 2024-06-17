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
         * ANIMAIS
         */

        /// a restante cria as permissões do projeto
        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'animais.visualizar',
            'modulo_id' => 2
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'animais.gerenciar',
            'modulo_id' => 2
        ]);

        /**
         * USUÁRIOS
         */

        Permissao::create([
            'nome' => 'Visualizar',
            'path' => 'usuarios.visualizar',
            'modulo_id' => 3
        ]);

        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'usuarios.gerenciar',
            'modulo_id' => 3
        ]);


        /**
         * PERMISSÕES
         */
        Permissao::create([
            'nome' => 'Gerenciar',
            'path' => 'permissoes.gerenciar',
            'modulo_id' => 4
        ]);
    }
}
