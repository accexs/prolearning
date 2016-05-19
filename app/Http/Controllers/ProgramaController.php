<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Programa;
use App\Tipo;
use App\Instituto;
use Validator;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Programa::with('tipo')->with('instituto.ciudad')->get());
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
                    'errors' => $validator->errors()->all()
                    ]);
            }else{
                $programa = new Programa;
                $programa -> name_es = $request->input('name_es');
                $programa -> name_en = $request->input('name_es');

                
                //Tipo::find($request->input('tipo'))->programas()->save($programa);
                $programa -> tipo_id = $request->input('tipo');
                Instituto::find($request->input('instituto'))->programas()->save($programa);
                
                return response()->json([
                    'success' => true]);
            }
         } catch (Exception $e){
            \Log::info('Error creating programa');
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
        return response()->json(Programa::with('instituto.ciudad')->with('tipo')->find($id));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
