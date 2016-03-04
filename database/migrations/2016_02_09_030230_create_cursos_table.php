<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_es',100);
            $table->string('name_en',100);
            $table->text('desc_es');
            $table->text('desc_en');
            $table->string('age',3);
            $table->text('duration_es');
            $table->text('duration_en');
            $table->text('capacity_es');
            $table->text('capacity_en');
            $table->text('date_es');
            $table->text('date_en');
            $table->text('summary_es');
            $table->text('summary_en');
            $table->integer('programa_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('cursos', function($table){
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cursos');
    }
}
