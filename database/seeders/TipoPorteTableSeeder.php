<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\TipoPorte;
use Illuminate\Database\Seeder;

class TipoPorteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPorte::create([
            'porte' => 'Pequeno'
        ]);

        TipoPorte::create([
            'porte' => 'Grande'
        ]);

        TipoPorte::create([
            'porte' => 'Médio'
        ]);
        TipoPorte::create([
            'porte' => 'Não se aplica'
        ]);

    }
}
