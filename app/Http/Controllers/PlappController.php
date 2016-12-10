<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlappController extends Controller
{
    //
    function pais(){
    	//
    	return view('backend.pais');
    }

    function ciudad(){
    	//
    	return view('backend.ciudad');
    }

    function instituto(){
    	//
    	return view('backend.instituto');
    }

    function programa(){
        //
        return view('backend.programa');
    }

    function promo(){
        //
        return view('backend.promo');
    }

    function testimonio(){
        //
        return view('backend.testimonio');
    }

    function admIndex(){
        //
        return view('backend.index');
    }
}
