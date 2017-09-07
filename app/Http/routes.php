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
	Route::get('ventas', ['as'=>'ventas','uses'=>'VentasController@index']);
	Route::resource('ventas', 'VentasController');
	Route::get('clientes', 'ClientesController@index');
	Route::resource('clientes','ClientesController');
	Route::get('usuarios', 'UsuariosController@index');
	Route::post('registrarcliente','ClientesController@store');
	Route::post('registrarclientes','VentasController@cliente');
	Route::post('datos_pro','VentasController@datos_pro');
	Route::get('pdf','VentasController@pdf');
	Route::get('pdfgeneral','VentasController@pdfgeneral');
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

	Route::get('registrarpaquete',['as'=>'registrarpaquete','uses'=>'VentasController@paquete']);
	Route::post('test-email','EnviarController@enviar');
	Route::get('email','EnviarController@index');
	Route::get('email2','EnviarController@index2');
	Route::get('material',['as'=>'material','uses'=>'MaterialController@index']);
	Route::resource('email','EnviarController');
	Route::post('registrarcat','MaterialController@registrarcategoria');

	Route::get('adminusu',['as'=>'adminusu','uses'=>'AdministrarController@indexusu']);
	Route::get('admincat',['as'=>'admincat','uses'=>'AdministrarController@indexcat']);
	Route::get('admincli',['as'=>'admincli','uses'=>'AdministrarController@indexcli']);
	Route::get('adminven',['as'=>'adminven','uses'=>'AdministrarController@indexven']);
	Route::get('adminpaq',['as'=>'adminpaq','uses'=>'AdministrarController@indexpaq']);

	Route::post('modifcat','AdministrarController@modifcat');
	Route::post('elicat','AdministrarController@elicat');

	Route::post('modifcli','AdministrarController@modifcli');
	Route::post('elicli','AdministrarController@elicli');

	Route::post('modifusu','AdministrarController@modifusu');
  Route::post('mcousu','AdministrarController@mcousu');
	Route::post('eliusu','AdministrarController@eliusu');

	Route::post('registrarmaterial','MaterialController@store');

	Route::post('regpaquete','VentasController@regpaquete');
	Route::post('regventas','VentasController@regventas');


	Route::post('cargar_archivo_correo', 'CorreoController@store');
	Route::post('enviar_correo', 'CorreoController@enviar');
	Route::post('enviar_correo2', 'CorreoController@enviar2');

	Route::post('cargarcliente','VentasController@cargarcliente');
  Route::post('cargarcliente2','VentasController@cargarcliente2');
  Route::post('cargarcliente3','VentasController@cargarcliente3');
	Route::post('cargardetalles','VentasController@cargardetalles');
	  Route::post('cargarproductos','VentasController@cargarproductos');
		Route::get('hojaprogramacion','MaterialController@hoja');
		Route::post('pdfhoja','MaterialController@pdfhoja');
		Route::post('cargarmaterial','MaterialController@cargarmaterial');
	  Route::post('cargarproductos2','VentasController@cargarproductos2');
    Route::get('tags', function (Illuminate\Http\Request  $request) {
        $term = $request->term ?: '';
        $tags = sccventas\Cliente::where('NOM_CLI', 'like', $term.'%')->select('id',DB::raw("CONCAT(NOM_CLI,' ',APA_CLI,' ',AMA_CLI) as full_name"))->lists('full_name','id');
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $id, 'text' => $tag];
        }

        return \Response::json($valid_tags);
    });
    Route::get('tags2', function (Illuminate\Http\Request  $request) {
        $term = $request->term ?: '';
        $tags = sccventas\Cliente::where('NOM_CLI', 'like', $term.'%')->select('id',DB::raw("CONCAT(NOM_CLI,' ',APA_CLI,' ',AMA_CLI,' - ',EMA_CLI) as full_name"))->where('EMA_CLI','!=','')->lists('full_name','id');
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $id, 'text' => $tag];
        }

        return \Response::json($valid_tags);
    });
});
