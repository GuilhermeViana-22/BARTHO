<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Database\Seeder;

class TiposAnimaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoAnimal::create([
            'tipo' => 'Cachorro'
        ]);

        TipoAnimal::create([
            'tipo' => 'Gato'
        ]);
    }
}
