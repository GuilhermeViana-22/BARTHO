<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdocoesRespostasTable extends Migration
{
    public function up()
    {
        Schema::create('adocoes_respostas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adocao_id')->constrained('adocoes');
            $table->foreignId('adocao_pergunta_id')->constrained('adocoes_perguntas');
            $table->foreignId('adocao_selecao_id')->nullable()->constrained('adocoes_selecoes');
            $table->string('resposta', 500)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adocoes_respostas');
    }
}
