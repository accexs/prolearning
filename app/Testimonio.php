<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    //
    protected $table = 'testimonios';
    protected $fillable = ['testimonio','name','location'];

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }
    
}
