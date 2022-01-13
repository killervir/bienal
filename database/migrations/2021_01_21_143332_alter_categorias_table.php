<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro', function (Blueprint $table) {
            $table->foreign('categorias')->references('id')->on('categorias')->after('tipoPostulacion');
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
            $table->dropColumn('categorias');
        });
    }
}
