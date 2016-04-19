<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
    protected $table = 'tipos';

    public function programas()
    {
    	return $this->hasMany('App\Programa');
    }
}
