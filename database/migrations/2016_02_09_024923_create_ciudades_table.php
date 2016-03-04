<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_es',100);
            $table->string('name_en',100);
            $table->string('info_es',100);
            $table->string('info_en',100);
            $table->string('code',50);
            $table->integer('pais_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('ciudades', function($table){
            $table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciudades');
    }
}
