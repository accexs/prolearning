<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img',100);
            $table->integer('pais_id')->unsigned()->nullable();
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->integer('instituto_id')->unsigned()->nullable();
            $table->integer('promocion_id')->unsigned()->nullable();
            $table->integer('testimonio_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('fotos', function($table){
            $table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('instituto_id')->references('id')->on('institutos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fotos');
    }
}
