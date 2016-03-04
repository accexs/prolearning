<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
    protected $table = 'ciudades';
    protected $fillable = ['name_es', 'name_en', 'info_es', 'info_en', 'code'];
	
    public function institutos()
    {
    	return $this->hasMany('App\Instituto');
    }

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }

	public function pais()
	{
		return $this->belongsTo('App\Pais');
	}


}
