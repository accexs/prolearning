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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Instituto::with('fotos')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    		}elseif ($request->input('instituto_id')) {
    			# code...
    			$foto -> instituto_id = $request->input('instituto_id');
    			$foto -> save();
    			return response()->json(['success' => true]);
            }elseif ($request->input('promo_id')) {
                # code...
                $foto -> promocion_id = $request->input('promo_id');
                $foto -> save();
                return response()->json(['success' => true]);
    		}else{
    			return response()->json(['success' => false]);
    		}
    		
    	}else{
    		return response()->json(['success' => false, 'error' => 'no file']);
    	}
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(Foto::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *Removes the specified resource from storage.
     * 
     * @param  collection $fotos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \File::delete(Foto::find($id)->img);
        return response()->json(['success' => true]);
    }
}
