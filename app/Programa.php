<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    //
    public function tipo()
    {
    	return $this->belongsTo('App\Tipo')
    }

    public function cursos()
    {
    	return $this->hasMany('App\Curso');
    }
}
