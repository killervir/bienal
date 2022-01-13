<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMotivoToRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro', function (Blueprint $table) {
            $table->string('motivo')->nullable()->after('verificacion');
            $table->text('otro_motivo')->nullable()->after('motivo');
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
            $table->removeColumn('motivo');
            $table->removeColumn('otro_motivo');
        });
    }
}
