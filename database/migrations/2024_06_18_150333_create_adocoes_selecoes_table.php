<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdocoesSelecoesTable extends Migration
{
    public function up()
    {
        Schema::create('adocoes_selecoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pergunta_id')->constrained('adocoes_perguntas');
            $table->string('selecao', 500);
            $table->boolean('ativo')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adocoes_selecoes');
    }
}
