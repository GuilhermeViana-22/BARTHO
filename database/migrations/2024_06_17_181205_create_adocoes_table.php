<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdocoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adocoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('situacao_id');
            $table->unsignedInteger('tipo_animal_id');
            $table->unsignedInteger('animal_id');
            $table->unsignedInteger('cidade_id');
            $table->string('cidade_outro')->nullable();
            $table->string('telefone');
            $table->integer('idade');
            $table->string('cpf');
            $table->string('social');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('is_presente', 255);
            $table->string('tipo_casa', 255);
            $table->string('restricoes_apartamento', 500)->nullable();
            $table->string('quantidade_adultos', 500);
            $table->string('quantidade_animais', 500)->nullable();
            $table->string('janela_is_telada', 255)->nullable();
            $table->string('acesso_rua', 255);
            $table->string('acesso_livre', 255);
            $table->integer('horas_sozinho');
            $table->string('responsavel_viagem', 255);
            $table->string('gravidez_situacao', 500);
            $table->string('medidas_alergia', 500);
            $table->string('medidas_mudanca_casa', 500);
            $table->string('circunstancias_abandono', 500);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adocoes');
    }
}
