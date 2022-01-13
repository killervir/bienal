<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNombreArtisticoToRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro', function (Blueprint $table) {
            $table->string('nombreArtistico')->nullable()->after('apellidoMaterno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registro', function (Blueprint $table) {
            $table->removeColumn('nombreArtistico');
        });
    }
}
