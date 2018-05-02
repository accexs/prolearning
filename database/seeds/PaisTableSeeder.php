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
        $paises = [
            ['name_es'  =>  'USA', 'desc_es' => 'Descripcion de USA'],
            ['name_es'  =>  'Canadá', 'desc_es' => 'Descripcion de Canadá'],
            ['name_es'  =>  'Francia', 'desc_es' => 'Descripcion de Francia'],
            ['name_es'  =>  'Alemania', 'desc_es' => 'Descripcion de Alemania'],
            ['name_es'  =>  'Australia', 'desc_es' => 'Descripcion de Australia'],
            ['name_es'  =>  'Malta', 'desc_es' => 'Descripcion de Malta'],
            ['name_es'  =>  'Italia', 'desc_es' => 'Descripcion de Italia'],
            ['name_es'  =>  'Inglaterra', 'desc_es' => 'Descripcion de Inglaterra'],
            ['name_es'  =>  'Sudáfrica', 'desc_es' => 'Descripcion de Sudáfrica'],
            ['name_es'  =>  'Irlanda', 'desc_es' => 'Descripcion de Irlanda'],
            ['name_es'  =>  'India', 'desc_es' => 'Descripcion de India'],
        ];
        foreach ($paises as $pais) {
            DB::table('paises')->insert($pais);
        }
    }
}
