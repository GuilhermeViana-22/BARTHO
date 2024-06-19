<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\SexoAnimal;
use App\Models\AreaRestrita\TipoAnimal;
use App\Models\AreaRestrita\TipoPergunta;
use Illuminate\Database\Seeder;

class TiposPerguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPergunta::create([
            'tipo' => 'Texto'
        ]);

        TipoPergunta::create([
            'tipo' => 'Múltipla escolha'
        ]);
    }
}
