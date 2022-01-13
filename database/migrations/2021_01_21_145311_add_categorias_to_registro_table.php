<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriasToRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro', function (Blueprint $table) {
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('categorias')->unsigned()->nullable()->after('tipoPostulacion');

            // 2. Create foreign key constraints
            $table->foreign('categorias')->references('id')->on('categorias')->onDelete('SET NULL');
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
            // 1. Drop foreign key constraints
            $table->dropForeign(['categorias']);

            // 2. Drop the column
            $table->dropColumn('categorias');
        });
    }
}
