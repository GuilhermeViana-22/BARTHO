<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldsFromAdocoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adocoes', function (Blueprint $table) {
            /// cria a coluna nome
            $table->string('nome', 500);
            $table->string('email', 500);

            /// e apaga as demais colunas
            $table->dropColumn('cidade_id');
            $table->dropColumn('cidade_outro');
            $table->dropColumn('social');
            $table->dropColumn('bairro');
            $table->dropColumn('endereco');
            $table->dropColumn('is_presente');
            $table->dropColumn('tipo_casa');
            $table->dropColumn('restricoes_apartamento');
            $table->dropColumn('quantidade_adultos');
            $table->dropColumn('quantidade_animais');
            $table->dropColumn('janela_is_telada');
            $table->dropColumn('acesso_rua');
            $table->dropColumn('acesso_livre');
            $table->dropColumn('horas_sozinho');
            $table->dropColumn('responsavel_viagem');
            $table->dropColumn('gravidez_situacao');
            $table->dropColumn('medidas_alergia');
            $table->dropColumn('medidas_mudanca_casa');
            $table->dropColumn('circunstancias_abandono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adocoes', function (Blueprint $table) {

            $table->unsignedInteger('cidade_id');
            $table->string('cidade_outro')->nullable();
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

            $table->dropColumn('nome');
            $table->dropColumn('email');
        });
    }
}
