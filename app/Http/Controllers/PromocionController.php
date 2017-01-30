<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promocion;
use Validator;

use App\Http\Requests;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Promocion::all());
        
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
        $rules[
            'title_es',
            'title_en',
            'desc_es',
            'desc_en'
        ];
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
                $promocion = new Promocion;
                $promocion->title_es = $request->input('title_es');
                $promocion->title_en = $request->input('title_en');
                $promocion->desc_es = $request->input('desc_es');
                $promocion->desc_en = $request->input('desc_en');

                $promocion->save();
                return response()->json(['success' => true,
                        'ciudad_id' => $promocion -> id]);
            }
            
        } catch (Exception $e) {
            \Log::info('Error creating promocion: '.$e);
            return response()->json(['success' => false]);
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
        $rules[
            'title_es',
            'title_en',
            'desc_es',
            'desc_en'
        ];
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
                $promocion = Promocion::find($id);
                $promocion->title_es = $request->input('title_es');
                $promocion->title_en = $request->input('title_en');
                $promocion->desc_es = $request->input('desc_es');
                $promocion->desc_en = $request->input('desc_en');

                $promocion->save();
                return response()->json(['success' => true,
                        'ciudad_id' => $promocion -> id]);
            }
            
        } catch (Exception $e) {
            \Log::info('Error editing promocion: '.$e);
            return response()->json(['success' => false]);
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
        Promocion::destroy($id);
        return response()->json(['success' => true]);
    }
}
