<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonio;
use Validator;

class TestimonioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Testimonio::all());
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
            'name' => 'required',
            'location' => 'required',
            'testimonio' => 'required'
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
            } else {
                $testimonio = new Testimonio;
                $testimonio->name = $request->input('name');
                $testimonio->location = $request->input('location');
                $testimonio->testimonio = $request->input('testimonio');

                $testimonio->save();
                return response()->json(['success' => true,
                        'testimonio_id' => $testimonio->id]);
            }
        } catch (Exception $e) {
            \Log::info('Error creating testimonio: '.$e);
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
        return response()->json(Testimonio::with('fotos')->find($id));
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
            'name' => 'required',
            'location' => 'required',
            'testimonio' => 'required'
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
            } else {
                $testimonio = Testimonio::find($id);
                $testimonio->name = $request->input('name');
                $testimonio->location = $request->input('location');
                $testimonio->testimonio = $request->input('testimonio');
                $testimonio->estado = 0;

                $testimonio->save();
                return response()->json(['success' => true,
                        'testimonio_id' => $testimonio->id]);
            }
        } catch (Exception $e) {
            \Log::info('Error editing testimonio: '.$e);
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
        Testimonio::destroy($id);
        return response()->json(['success' => true]);
    }
}
