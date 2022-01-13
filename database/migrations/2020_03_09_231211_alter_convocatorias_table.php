<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterConvocatoriasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('convocatorias', function (Blueprint $table) {
            $table->string('cve_convoca')->after('titulo_convocatoria');
            $table->text('txt_descripcion')->after('fch_hora_ini');
            $table->text('txt_introduccion')->after('txt_descripcion');
            $table->text('img_convoca')->after('txt_introduccion');
            $table->text('img_convoca_redes')->after('img_convoca');
            $table->text('desc_redes')->after('img_convoca_redes');
            $table->text('url_convoca')->after('status');
            $table->text('url_convoca_form')->after('url_convoca');
            $table->text('url_bases')->after('url_convoca_form');
            $table->text('url_resultados')->after('url_bases');
            $table->text('msg_confirma')->after('url_resultados');
            $table->text('msg_correo')->after('msg_confirma');
            $table->string('cve_co', 5)->after('msg_correo');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('convocatorias', function (Blueprint $table) {            
            $table->dropColumn('cve_convoca');
            $table->dropColumn('txt_descripcion');
            $table->dropColumn('txt_introduccion');
            $table->dropColumn('img_convoca');
            $table->dropColumn('img_convoca_redes');
            $table->dropColumn('desc_redes');
            $table->dropColumn('url_convoca');
            $table->dropColumn('url_convoca_form');
            $table->dropColumn('url_bases');
            $table->dropColumn('url_resultados');
            $table->dropColumn('msg_confirma');
            $table->dropColumn('msg_correo');
            $table->dropColumn('cve_co');            
        });
    }

}
