<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// cria o primeiro módulo que se refere ao super usuário
        Modulo::create([
            'nome' => 'Super',
        ]);

        /// todas as restantes
        Modulo::create([
            'nome' => 'Animais',
        ]);

        Modulo::create([
            'nome' => 'Usuários',
        ]);

        Modulo::create([
            'nome' => 'Permissoes',
        ]);

        Modulo::create([
            'nome' => 'Adoções',
        ]);

        Modulo::create([
            'nome' => 'Perguntas para adoção',
        ]);
    }
}
