<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ciudad;
use App\Instituto;
use Validator;

class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Instituto::all());
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
                $instituto = new Instituto;
                $instituto -> name = $request->input('name');
                $instituto -> desc_es = $request->input('desc_es');
                $instituto -> desc_en = $request->input('desc_en');
                $instituto -> logo = $request->input('logo');
                $instituto -> location1 = $request->input('location1');
                $instituto -> coord1 = $request->input('coord1');
                $instituto -> location2 = $request->input('location2');
                $instituto -> coord2 = $request->input('coord2');
                $instituto -> location3 = $request->input('location3');
                $instituto -> coord3 = $request->input('coord3');
                $instituto -> reasons_es = $request->input('reasons_es');
                $instituto -> reasons_en = $request->input('reasons_en');
                $instituto -> website = $request->input('website');
                $instituto -> tel = $request->input('tel');
                $instituto -> campustour_es = $request->input('campustour_es');
                $instituto -> campustour_en = $request->input('campustour_en');
                $instituto -> programs_es = $request->input('programs_es');
                $instituto -> programs_en = $request->input('programs_en');
                $instituto -> accomm_es = $request->input('accomm_es');
                $instituto -> accomm_en = $request->input('accomm_en');
                $instituto -> activities_es = $request->input('activities_es');
                $instituto -> activities_en = $request->input('activities_en');
                $instituto -> price = $request->input('prie');
                $instituto -> mail = $request->input('mail');
                Ciudad::find($request->input('ciudad'))->institutos() -> save($instituto);

                return response()->json(['success' => true]);
            }
        } catch (Exception $e){
            \Log::info('Error creating instituto');
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
        return response()->json(Instituto::find($id));
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
                    'errors' => $valwidator->errors()->all(),
                    'code' => 400
                    ]);
            }else{
                $instituto = Instituto::find($id);
                $instituto -> name = $request->input('name');
                $instituto -> desc_es = $request->input('desc_es');
                $instituto -> desc_en = $request->input('desc_en');
                $instituto -> logo = $request->input('logo');
                $instituto -> location1 = $request->input('location1');
                $instituto -> coord1 = $request->input('coord1');
                $instituto -> location2 = $request->input('location2');
                $instituto -> coord2 = $request->input('coord2');
                $instituto -> location3 = $request->input('location3');
                $instituto -> coord3 = $request->input('coord3');
                $instituto -> reasons_es = $request->input('reasons_es');
                $instituto -> reasons_en = $request->input('reasons_en');
                $instituto -> website = $request->input('website');
                $instituto -> tel = $request->input('tel');
                $instituto -> campustour_es = $request->input('campustour_es');
                $instituto -> campustour_en = $request->input('campustour_en');
                $instituto -> programs_es = $request->input('programs_es');
                $instituto -> programs_en = $request->input('programs_en');
                $instituto -> accomm_es = $request->input('accomm_es');
                $instituto -> accomm_en = $request->input('accomm_en');
                $instituto -> activities_es = $request->input('activities_es');
                $instituto -> activities_en = $request->input('activities_en');
                $instituto -> price = $request->input('prie');
                $instituto -> mail = $request->input('mail');
                Ciudad::find($request->input('ciudad'))->institutos -> save($instituto);

                return response()->json(['success' => true]);
            }
        } catch (Exception $e){
            \Log::info('Error creating instituto');
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
        Instituto::destroy($id);
        return response()->json(['success' => true]);
    }
}
