<?php
use Illuminate\Support\Facades\Route;
use App\Mascota;
use App\Propietario;
//use DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
   // return view('welcome');
//});
Route::get('/', function () {
    return view('login');
});

Route::get('prueba', function(){
	//return base64_encode('HOLA');
	//return DB::select("SELECT * FROM usuarios");

});


Route::get('desencriptar', function(){
	return base64_decode('SE9MQQ==');
});

Route::post('validar','AccesoController@validar'); 

Route::apiResource('apiMascota','MascotaController');

Route::apiResource('apiEspecie','EspecieController');

Route::apiResource('apiProducto','ProductoController');

Route::get('masc', function () {
    return view('mascotas');
});

Route::get('ventas', function () {
	return view('ventas');
});

//Route::view('especies','especies');

Route::get('especies', function(){
	return view('especies');
});

Route::get('main', function(){
	return view('main');
});

Route::get('propietarios', function(){
	return view('propietarios');
});

// RUTA PARAMETRIZADAS

Route::get('getRazas/{id_especie}', [
	'as' => 'getRazas',
	'uses' => 'EspecieController@getRazas',
]);
