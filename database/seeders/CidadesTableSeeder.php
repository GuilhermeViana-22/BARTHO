<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\Cidade;
use App\Models\User;
use Illuminate\Database\Seeder;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create([
            'cidade' => 'São Paulo'
        ]);

        Cidade::create([
            'cidade' => 'São Caetano do Sul'
        ]);

        Cidade::create([
            'cidade' => 'Santo André'
        ]);

        Cidade::create([
            'cidade' => 'São Bernardo'
        ]);

        Cidade::create([
            'cidade' => 'Mauá'
        ]);

        Cidade::create([
            'cidade' => 'Diadema'
        ]);

        Cidade::create([
            'cidade' => 'Outra'
        ]);
    }
}
