<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasFrecuentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_frecuentes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('pregunta');
            $table->text('respuesta');
            $table->enum('status',[0,1]);
            $table->unsignedInteger('convocatorias_id');
            $table->foreign('convocatorias_id')->references('id')->on('convocatorias');
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
        Schema::dropIfExists('preguntas_frecuentes');
    }
}
