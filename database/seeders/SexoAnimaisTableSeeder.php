<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\SexoAnimal;
use App\Models\AreaRestrita\TipoAnimal;
use Illuminate\Database\Seeder;

class SexoAnimaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SexoAnimal::create([
            'sexo' => 'Macho'
        ]);

        SexoAnimal::create([
            'sexo' => 'Fêmea'
        ]);
    }
}
