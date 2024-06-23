<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdocoesPerguntasTable extends Migration
{
    public function up()
    {
        Schema::create('adocoes_perguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_pergunta_id')->constrained('tipos_perguntas');
            $table->string('pergunta')->nullable();
            $table->boolean('obrigatorio')->default(0);
            $table->boolean('ativo')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adocoes_perguntas');
    }
}
