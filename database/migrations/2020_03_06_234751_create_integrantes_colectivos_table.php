<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantesColectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes_colectivos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_registro');
            $table->foreign('id_registro')->references('id')->on('registro');            
            $table->string('integrante',250);
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
        Schema::dropIfExists('integrantes_colectivos');
    }
}
