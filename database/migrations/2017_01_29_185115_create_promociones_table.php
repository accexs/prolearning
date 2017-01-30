<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado');
            $table->string('title_es');
            $table->string('title_en');
            $table->text('desc_es');
            $table->text('desc_en');
            $table->timestamps();
        });

        Schema::table('fotos', function($table){
            $table->foreign('promocion_id')->references('id')->on('promociones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fotos', function($table){
            $table->dropForeign(['promocion_id']);
        });
        Schema::drop('promociones');
    }
}
