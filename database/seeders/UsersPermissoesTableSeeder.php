<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\Permissao;
use App\Models\AreaRestrita\UserPermissao;
use Illuminate\Database\Seeder;

class UsersPermissoesTableSeeder extends Seeder
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
        UserPermissao::create([
            'user_id' => 1,
            'permissao_id' => 1
        ]);
    }
}
