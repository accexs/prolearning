<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    //
    protected $table = 'institutos';
    protected $fillable = ['name', 'desc_es', 'desc_en', 'logo', 'location1', 'coord1', 'location2', 'coord2', 'location3', 'coord3', 'reasons_es', 'reasons_en', 'website', 'tel', 'campusttour_es', 'campustour_en', 'programs_es', 'programs_en', 'accomm_es', 'accomm_en', 'activities_es', 'activities_en', 'price', 'mail',];

    public function programas()
    {
    	return $this->hasMany('App\Programa');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }
}
