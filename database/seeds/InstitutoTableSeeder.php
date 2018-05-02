<?php

use Illuminate\Database\Seeder;

class InstitutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $institutos = [
            ['name' => 'ILSC', 'desc_es' => 'test', 'location1' => 'test', 'coord1' => 'test', 'reasons_es' => 'test',
            'website' => 'test', 'tel' => 'test', 'campustour_es' => 'test', 'programs_es' => 'test',
            'accomm_es' => 'test', 'activities_es' => 'test', 'price' => 'test', 'mail' => 'test@mail.com', 'ciudad_id' => '1'],
            ['name' => 'EMBASSY CES', 'desc_es' => 'test', 'location1' => 'test', 'coord1' => 'test', 'reasons_es' => 'test',
            'website' => 'test', 'tel' => 'test', 'campustour_es' => 'test', 'programs_es' => 'test',
            'accomm_es' => 'test', 'activities_es' => 'test', 'price' => 'test', 'mail' => 'test@mail.com', 'ciudad_id' => '1'],
            ['name' => 'EC', 'desc_es' => 'test', 'location1' => 'test', 'coord1' => 'test', 'reasons_es' => 'test',
            'website' => 'test', 'tel' => 'test', 'campustour_es' => 'test', 'programs_es' => 'test',
            'accomm_es' => 'test', 'activities_es' => 'test', 'price' => 'test', 'mail' => 'test@mail.com', 'ciudad_id' => '3'],
            ['name' => 'EMBASSY CES', 'desc_es' => 'test', 'location1' => 'test', 'coord1' => 'test', 'reasons_es' => 'test',
            'website' => 'test', 'tel' => 'test', 'campustour_es' => 'test', 'programs_es' => 'test',
            'accomm_es' => 'test', 'activities_es' => 'test', 'price' => 'test', 'mail' => 'test@mail.com', 'ciudad_id' => '2'],
            ['name' => 'EC', 'desc_es' => 'test', 'location1' => 'test', 'coord1' => 'test', 'reasons_es' => 'test',
            'website' => 'test', 'tel' => 'test', 'campustour_es' => 'test', 'programs_es' => 'test',
            'accomm_es' => 'test', 'activities_es' => 'test', 'price' => 'test', 'mail' => 'test@mail.com', 'ciudad_id' => '2'],
            ['name' => 'EC', 'desc_es' => 'test', 'location1' => 'test', 'coord1' => 'test', 'reasons_es' => 'test',
            'website' => 'test', 'tel' => 'test', 'campustour_es' => 'test', 'programs_es' => 'test',
            'accomm_es' => 'test', 'activities_es' => 'test', 'price' => 'test', 'mail' => 'test@mail.com', 'ciudad_id' => '1']
        ];
        foreach ($institutos as $instituto) {
            DB::table('institutos')->insert($instituto);
        }
    }
}
