<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagensToAnimaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animais', function (Blueprint $table) {
            $table->dropColumn('imagem');

            $table->string('imagem1')->nullable();
            $table->string('imagem2')->nullable();
            $table->string('imagem3')->nullable();
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
            $table->string('imagem')->nullable();

            $table->dropColumn('imagem1')->nullable();
            $table->dropColumn('imagem2')->nullable();
            $table->dropColumn('imagem3')->nullable();
        });
    }
}
