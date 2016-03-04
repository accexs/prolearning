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
}
