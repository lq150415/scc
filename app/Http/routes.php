<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
 
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
    	return view('index');
	});
	Route::get('ventas', 'VentasController@index');
	Route::resource('ventas', 'VentasController');
	Route::get('clientes', 'ClientesController@index');
	Route::resource('clientes','ClientesController');
	Route::get('usuarios', 'UsuariosController@index');
	Route::post('registrarcliente','ClientesController@store');
	Route::post('registrarclientes','VentasController@cliente');
	Route::post('datos_pro','VentasController@datos_pro');
	Route::get('pdf','VentasController@pdf');
	Route::get('graficos','VentasController@graficos');
	Route::get('grafcol','VentasController@graficos3');
	Route::get('grafcols','VentasController@graficos2');
	Route::post('usuarios','UsuariosController@index');
	Route::resource('usuarios','UsuariosController');
	Route::post('registrarusuario','UsuariosController@store');
	Route::get('prestamo','PrestamoController@index');
	Route::resource('prestamo','PrestamoController');
	Route::post('devolucion','PrestamoController@devolucion');
	Route::post('registrarprestamos','PrestamoController@store');
	Route::post('test-email','EnviarController@enviar');
	Route::get('email','EnviarController@index');
	Route::get('materialprog','MaterialController@index');
	Route::get('materialsumma','MaterialController@index2');
	Route::resource('email','EnviarController');
	Route::post('registrarcat','MaterialController@registrarcategoria');
	Route::get('admincat',['as'=>'admincat','uses'=>'AdministrarController@indexcat']);
	Route::post('modifcat','AdministrarController@modifcat');
	Route::post('elicat','AdministrarController@elicat');
});
