<?php

use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $paises = [
        	['name_es'	=>	'USA'],
        	['name_es'	=>	'Canadá'],
        	['name_es'	=>	'Francia'],
        	['name_es'	=>	'Alemania'],
        	['name_es'	=>	'Australia'],
        	['name_es'	=>	'Malta'],
        	['name_es'	=>	'Italia'],
        	['name_es'	=>	'Inglaterra'],
        	['name_es'	=>	'Sudáfrica'],
        	['name_es'	=>	'Irlanda'],
        	['name_es'	=>	'India'],
        ];
        foreach ($paises as $pais) {
        	DB::table('paises')->insert($pais);
        }
     
    }
}
