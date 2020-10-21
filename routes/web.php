<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::view('/', 'welcome');
Auth::routes();


//Route::post('update', 'Auth\RegisterController@sqlupdate')->name('update');



/* no entiendo porque funciona igual
Route::get('/localidad',  'LocalidadController@index')->name('localidades');
Route::get('/localidad/index',  'LocalidadController@index')->name('localidad.index');
Route::get('/localidad/create',  'LocalidadController@create')->name('localidad.create');
Route::get('/localidad/edit',  'LocalidadController@edit')->name('localidad.edit');
Route::get('/localidad/update',  'LocalidadController@update');
Route::get('/localidad/destroy',  'LocalidadController@destroy')->name('localidad.destroy');
*/

Route::group(['middleware' => ['auth']], function (){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('localidad', 'LocalidadController');
});

// Rutas de los examples pages bootstrap.
// Resources/views/vendor/adminlte/pages agregados a mano
Route::get('/chartjs',  'BootstrapExampleController@chartjs')->name('chartjs');
Route::get('/flot',     'BootstrapExampleController@flot')->name('flot');
Route::get('/inline',   'BootstrapExampleController@inline')->name('inline');
Route::get('/data',     'BootstrapExampleController@data')->name('data');
/*
Route::get('/login/admin',      'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin',   'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin',     'Auth\LoginController@adminLogin');
Route::post('/register/admin',  'Auth\RegisterController@createAdmin');

Route::get('/login/usuario',      'Auth\LoginController@showUsuarioLoginForm');
Route::get('/register/usuario',   'Auth\RegisterController@showUsuarioRegisterForm');

Route::post('/login/usuario',     'Auth\LoginController@usuarioLogin');
Route::post('/register/usuario',  'Auth\RegisterController@createUsuario');

Route::view('/home', 'home')->middleware('auth');
*/
