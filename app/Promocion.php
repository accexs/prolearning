<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    //
    protected $table = 'promociones';
    protected $fillable = ['promociones','name_es','name_en', 'desc_es', 'desc_en'];

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }
}
