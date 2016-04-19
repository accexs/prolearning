<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    //
    protected $table = "programas";

    public function tipo()
    {
    	return $this->belongsTo('App\Tipo');
    }

    public function cursos()
    {
    	return $this->hasMany('App\Curso');
    }

    public function instituto()
    {
    	return $this->belongsTo('App\Instituto');
    }
}
