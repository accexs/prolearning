<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ciudad;
use App\Pais;
use Validator;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Ciudad::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $rules = [];
        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                # code...
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->all(),
                    'code' => 400
                    ]);
            }else{
                $ciudad = new Ciudad;
                $ciudad -> name_es = $request->input('name_es');
                $ciudad -> name_en = $request->input('name_en');
                $ciudad -> info_es = $request->input('info_es');
                $ciudad -> info_en = $request->input('info_en');
                $ciudad -> code = $request->input('code');
                Pais::find($request->input('pais'))->ciudades() -> save($ciudad);

                return response()->json(['success' => true,
                        'ciudad_id' => $ciudad -> id]);
            }
        } catch (Exception $e) {
            \Log::info('Error creating ciudad: '.$e);
            return response()->json(['success' => false], 500);
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
        return response()->json(Ciudad::find($id));
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
        $rules = [];
        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                # code...
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->all(),
                    'code' => 400
                    ]);
            }else{
                $ciudad = Ciudad::find($id);
                $ciudad -> name_es = $request->input('name_es');
                $ciudad -> name_en = $request->input('name_en');
                $ciudad -> info_es = $request->input('info_es');
                $ciudad -> info_en = $request->input('info_en');
                $ciudad -> code = $request->input('code');
                Pais::find($request->input('pais'))->ciudades() -> save($ciudad);

                return response()->json(['success' => true]);
            }
        } catch (Exception $e) {
            \Log::info('Error editing ciudad: '.$e);
            return response()->json(['success' => false], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ciudad::destroy($id);
        return response()->json(['success' => true]);
    }
}