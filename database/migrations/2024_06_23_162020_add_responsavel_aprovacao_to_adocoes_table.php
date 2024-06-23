<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponsavelAprovacaoToAdocoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adocoes', function (Blueprint $table) {
            $table->string('responsavel_aprovacao')->nullable();
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
            $table->dropColumn('responsavel_aprovacao');
        });
    }
}
