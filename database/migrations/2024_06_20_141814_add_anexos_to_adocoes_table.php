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
            $table->string('anexo_1')->nullable();
            $table->string('anexo_2')->nullable();
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
            $table->dropColumn('anexo_1');
            $table->dropColumn('anexo_2');
        });
    }
}
