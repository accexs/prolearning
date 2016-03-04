<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_es',100);
            $table->string('name_en',100);
            $table->integer('tipo_id')->unsigned();
            $table->integer('instituto_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('programas', function($table){
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
        Schema::drop('programas');
    }
}
