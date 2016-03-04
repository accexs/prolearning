<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //
    protected $table = 'paises';
    protected $fillable = ['name_es', 'name_en'];

    public function ciudades()
       {
           return $this->hasMany('App\Ciudad');
       }
}
