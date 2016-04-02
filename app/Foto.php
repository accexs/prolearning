<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table = 'fotos';
    protected $fillable = ['img'];

    public function ciudad()
    {
    	return $this->belongsTo('App\Ciudad');
    }

    public function instituto()
    {
    	return $this->belongsTo('App\Instituto');
    }
}
