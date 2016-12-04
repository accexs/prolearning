<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipos')->insert([
                    'name_es' => 'Cursos de idioma',
                    'name_en' => 'Language Programs',
                    'tipo' => 'Adultos',
                ]);

        DB::table('tipos')->insert([
                    'name_es' => 'Cursos de idioma',
                    'name_en' => 'Language Programs',
                    'tipo' => 'Jóvenes',
                ]);
    }
}
