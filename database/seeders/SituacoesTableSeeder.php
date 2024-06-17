<?php

namespace Database\Seeders;

use App\Models\AreaRestrita\Situacao;
use Illuminate\Database\Seeder;

class SituacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situacao::create([
            'situacao' => 'Aguardando aprovação',
            'cor' => '#F4A460'
        ]);

        Situacao::create([
            'situacao' => 'Reprovado(a)',
            'cor' => '#BB2A2A'
        ]);

        Situacao::create([
            'situacao' => 'Aprovado(a)',
            'cor' => '#2DD25A'
        ]);

        Situacao::create([
            'situacao' => 'Concluído(a)',
            'cor' => '#2DD25A'
        ]);

        Situacao::create([
            'situacao' => 'Cancelado(a)',
            'cor' => '#BB2A2A'
        ]);
    }
}
