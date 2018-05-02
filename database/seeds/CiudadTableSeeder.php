<?php

use Illuminate\Database\Seeder;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ciudades = [
            ['name_es' => 'SAN FRANCISCO', 'info_es' => 'Descripcion SAN FRANCISCO', 'pais_id' => '1'],
            ['name_es' => 'NUEVA YORK', 'info_es' => 'Descripcion NUEVA YORK', 'pais_id' => '1'],
            ['name_es' => 'MIAMI', 'info_es' => 'Descripcion MIAMI', 'pais_id' => '1']
        ];
        foreach ($ciudades as $ciudad) {
            DB::table('ciudades')->insert($ciudad);
        }
    }
}
