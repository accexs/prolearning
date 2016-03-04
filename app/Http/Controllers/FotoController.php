<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Foto;
use App\Ciudad;
use Validator;

class FotoController extends Controller
{
    //
    public function store(Request $request)
    {
    	//
    	if ($request->hasFile('img1')) {
    		# code...
    		$file = $request->file('img1');
    		$foto = new Foto;
    		$extension = $file->getClientOriginalExtension();
    		$filename = $foto -> id .'pic'.'.'.$extension;
    		$path = 'uploads/';
    		$file->move($path,$filename);
    		$foto -> img = $path.$filename;
    		//check if pais or ciudad
    		$foto -> ciudad_id = $request->input('ciudad_id');
    		$foto -> save();
    		return response()->json(['success' => true]);
    	}else{
    		return response()->json(['success' => false]);
    	}
    	


    }
}
