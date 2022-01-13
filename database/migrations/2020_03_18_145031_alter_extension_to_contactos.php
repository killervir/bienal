<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterExtensionToContactos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->integer('extension1')->after('telefono1');
            $table->integer('extension2')->after('telefono2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->removeColumn('extension1');
            $table->removeColumn('extension2');
        });
    }
}
