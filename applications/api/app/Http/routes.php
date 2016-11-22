<?php

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

Route::group(['middleware' => ['web','cors']], function () {
	Route::get('/', function () {
		return view('index');
	});

	//API v1
	Route::group(['prefix' => 'v1'], function () {
		Route::get('group/', 'GruposVehiculoController@index');

		Route::get('group/{grupoId}/position', 
			'UltimasPosicionesVehiculosController@index')->where(array('grupoId' => '[a-zA-Z0-9\-]+'));

		Route::get('group/{grupoId}/bus',
			'VehiculosController@index')->where(array('grupoId' => '[a-zA-Z0-9\-]+'));

		Route::get('group/{grupoId}/track/summary',
			'ResumenController@index')->where(array('grupoId' => '[a-zA-Z0-9\-]+'));

		Route::get('bus/{vehiculoId}/position',
			'UltimaPosicionVehiculoController@index')->where(array('vehiculoId' => '[a-zA-Z0-9\-]+'));

		Route::get('bus/{vehiculoId}/track', 
			'ViajesController@index')->where(array('vehiculoId' => '[a-zA-Z0-9\-]+'));

		Route::get('bus/{vehiculoId}/track/summary', 
			'ResumenController@resumenVehiculo')->where(array('vehiculoId' => '[a-zA-Z0-9\-]+'));

		Route::get('track/{viajeId}/location', 
			'PosicionesViajeController@index')->where(array('viajeId' => '[0-9]+'));

		Route::get('place', 'SitiosController@index');   
	});
});

//Route::group(['prefix' => 'v2'], function () {
  //Para la versión 2 del API  
//});
