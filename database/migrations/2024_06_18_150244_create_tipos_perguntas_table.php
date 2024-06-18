<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPerguntasTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_perguntas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_perguntas');
    }
}
