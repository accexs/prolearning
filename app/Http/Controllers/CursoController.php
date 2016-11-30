<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso;
use App\Programa;
use Validator;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Curso::all());
    }

    public function indexByPrograma($id)
    {
        //
        return response()->json(Programa::find($id)->cursos);
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
        $rules = [
            'name_es' => 'required',
            'name_en' => 'required',
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
                $curso = new Curso;
                $curso -> name_es = $request->input('name_es');
                $curso -> name_en = $request->input('name_en');
                $curso -> summary_es = $request->input('summary_es');
                $curso -> summary_en = $request->input('summary_en');
                $curso -> desc_es = $request->input('desc_es');
                $curso -> desc_en = $request->input('desc_en');
                $curso -> duration_es = $request->input('duration_es');
                $curso -> duration_en = $request->input('duration_en');
                $curso -> age_es = $request->input('age_es');
                $curso -> age_en = $request->input('age_en');
                $curso -> quantity_es = $request->input('quantity_es');
                $curso -> quantity_en = $request->input('quantity_en');
                $curso -> date_es = $request->input('date_es');
                $curso -> date_en = $request->input('date_en');
                $curso -> programa_id = $request->input('programa_id');
                $curso -> save();

                return response()->json(['success' => true]);
            }
            
        } catch (Exception $e) {
            \Log::info('Error creating curso: '.$e);
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
        return response()->json(Curso::find($id));
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
        $rules = [
            'name_es' => 'required',
            'name_en' => 'required',
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
                $curso = Curso::find($id);
                $curso -> name_es = $request->input('name_es');
                $curso -> name_en = $request->input('name_en');
                $curso -> summary_es = $request->input('summary_es');
                $curso -> summary_en = $request->input('summary_en');
                $curso -> desc_es = $request->input('desc_es');
                $curso -> desc_en = $request->input('desc_en');
                $curso -> duration_es = $request->input('duration_es');
                $curso -> duration_en = $request->input('duration_en');
                $curso -> age_es = $request->input('age_es');
                $curso -> age_en = $request->input('age_en');
                $curso -> quantity_es = $request->input('quantity_es');
                $curso -> quantity_en = $request->input('quantity_en');
                $curso -> date_es = $request->input('date_es');
                $curso -> date_en = $request->input('date_en');
                $curso -> programa_id = $request->input('programa_id');
                $curso -> save();
                $curso -> save();

                return response()->json(['success' => true]);
            }
            
        } catch (Exception $e) {
            \Log::info('Error editing curso: '.$e);
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
        Curso::destroy($id);
        return response()->json(['success' => true]);
    }
}
