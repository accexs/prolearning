<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', function () {
        return view('home');
    });

    Route::auth();

    // API ROUTES
    Route::group(array('prefix' => 'api'), function() {

        //fotos
        Route::post('fotos', 'FotoController@store');

    	//paises
    	Route::resource('paises', 'PaisController');

        //ciudades
        Route::resource('ciudades', 'CiudadController');

        //institutos
        Route::resource('institutos', 'InstitutoController'/*,array(
            'only' => array('index', 'show', 'store', 'destroy'))*/);
        //Route::post('institutos/{id}', 'InstitutoController@update');
        
        Route::get('institutos/ciudad/{id}', 'InstitutoController@indexByCiudad');

        //programas
        Route::resource('programas', 'ProgramaController');

        //tipos
        Route::resource('tipos', 'TipoController');

        //cursos
        Route::resource('cursos', 'CursoController');
    });

    Route::get('pais','PlappController@pais');
    Route::get('ciudad','PlappController@ciudad');
    Route::get('instituto','PlappController@instituto');
    Route::get('programa','PlappController@programa');
    Route::get('curso','PlappController@curso');

});
