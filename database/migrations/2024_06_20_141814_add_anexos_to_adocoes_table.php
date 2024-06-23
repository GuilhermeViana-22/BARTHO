<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnexosToAdocoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adocoes', function (Blueprint $table) {
            $table->string('termo_adocao')->nullable();
            $table->string('documento_identidade')->nullable();
            $table->string('comprovante_endereco')->nullable();
            $table->string('foto_adocao')->nullable();
            $table->string('observacao', 500)->nullable();
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
            $table->dropColumn('termo_adocao');
            $table->dropColumn('documento_identidade');
            $table->dropColumn('comprovante_endereco');
            $table->dropColumn('foto_adocao');
            $table->dropColumn('observacao');
        });
    }
}
