<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->text('desc_es');
            $table->text('desc_en');
            //$table->string('logo',100);
            $table->string('location1',150);
            $table->string('coord1',30);
            $table->string('location2',150)->nullable();
            $table->string('coord2',30)->nullable();
            $table->string('location3',150)->nullable();
            $table->string('coord3',30)->nullable();
            $table->text('reasons_es');
            $table->text('reasons_en');
            $table->string('website',100);
            $table->string('tel',20);
            $table->text('campustour_es');
            $table->text('campustour_en');
            $table->text('programs_es');
            $table->text('programs_en');
            $table->text('accomm_es');
            $table->text('accomm_en');
            $table->text('activities_es');
            $table->text('activities_en');
            $table->string('price',20);
            $table->string('mail',100);
            $table->integer('ciudad_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('institutos', function($table){
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('institutos');
    }
}
