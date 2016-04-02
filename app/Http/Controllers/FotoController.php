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
    	if ($request->hasFile('img')) {
    		# code...
    		$file = $request->file('img');
    		$foto = new Foto;
    		$extension = $file->getClientOriginalExtension();
    		$filename = uniqid('img_') .'.'.$extension;
    		$path = 'uploads/';
    		$file->move($path,$filename);
    		$foto -> img = $path.$filename;
    		//check if pais or ciudad
    		if ($request->input('ciudad_id')) {
    			# code...
    			$foto -> ciudad_id = $request->input('ciudad_id');
    			$foto -> save();
    			return response()->json(['success' => true]);
    		}elseif ($request->input('pais_id')) {
    			# code...
    			$foto -> pais_id = $request->input('ciudad_id');
    			$foto -> save();
    			return response()->json(['success' => true]);
    		}else{
    			return response()->json(['success' => false]);
    		}
    		
    	}else{
    		return response()->json(['success' => false]);
    	}
    	


    }
}
