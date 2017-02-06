<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('location', 100);
            $table->text('testimonio');
            $table->boolean('estado');
            $table->timestamps();
        });

        Schema::table('fotos', function($table){
            $table->foreign('testimonio_id')->references('id')->on('testimonios')->onDelete('cascade');
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
            $table->dropForeign(['testimonio_id']);
        });
        Schema::drop('testimonios');
    }
}
