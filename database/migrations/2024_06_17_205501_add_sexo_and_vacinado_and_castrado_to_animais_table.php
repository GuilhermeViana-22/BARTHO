<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSexoAndVacinadoAndCastradoToAnimaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animais', function (Blueprint $table) {
            $table->integer('sexo_id')->nullable();
            $table->boolean('vacinado')->nullable();
            $table->boolean('castrado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animais', function (Blueprint $table) {
            $table->dropColumn('especie_id');
            $table->dropColumn('vacinado');
            $table->dropColumn('castrado');
        });
    }
}
