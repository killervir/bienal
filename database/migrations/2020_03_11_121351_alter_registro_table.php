<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro', function (Blueprint $table) {
            //$table->integer('verificacion')->nullable()->change();  
			DB::statement('ALTER TABLE `registro` MODIFY `verificacion` INTEGER UNSIGNED NULL;');
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
            $table->removeColumn('verificacion');            
        });
    }
}
