<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio')->unique();
            $table->unsignedInteger('id_convocatoria');
            $table->foreign('id_convocatoria')->references('id')->on('convocatorias');
            $table->enum('status',[0,1]);
            $table->enum('tipoPostulacion', [1,2]);
            $table->string('nombre',250);
            $table->string('apellidoPaterno',250);
            $table->string('apellidoMaterno',250);
            $table->string('nombreColectivo',250);
            $table->string('usuarioTemporal',15)->unique();
            $table->string('contrasenia', 10);
            $table->date('fechaNacimiento');
            $table->integer('id_nacionalidad');
            $table->foreign('id_nacionalidad')->references('id')->on('nacionalidad');
            $table->string('lugarResidencia',250);
            $table->string('email',250);
            $table->integer('telefono');
            $table->integer('extension');
            $table->text('semblanza');
            $table->string('documentosPersonales',250);
            $table->integer('disciplina');
            $table->string('tituloProyecto',250);
            $table->year('anoRealizacion');
            $table->text('descripcionProyecto');
            $table->string('adjuntarProyecto',250);                        
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
        Schema::dropIfExists('registro');
    }
}
