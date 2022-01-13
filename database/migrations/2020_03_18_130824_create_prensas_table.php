<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrensasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prensas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titulo',255);
            $table->string('subtitulo',255)->nullable();
            $table->text('descripcion');
            $table->text('imagen')->nullable();
            $table->text('link_kit')->nullable();
            $table->enum('status',[0,1]);
            $table->dateTime('fecha_publica');
            $table->unsignedInteger('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('prensas');
    }
}
