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
    Route::get('/listausuarios', 'UsuarioController@index')->name('listausuarios');

    //Factorys
    Route::get('/localidad/factory', 'LocalidadController@factory')->name('localidad.factory');
    Route::get('/clasificacion/factory', 'ClasificacionController@factory')->name('clasificacion.factory');
    Route::get('/sucursal/factory', 'SucursalController@factory')->name('sucursal.factory');
    Route::get('/taller/factory', 'TallerController@factory')->name('taller.factory');
    Route::get('/cargo/factory', 'CargoController@factory')->name('cargo.factory');
    Route::get('/turno/factory', 'TurnoController@factory')->name('turno.factory');
    Route::get('/grupo/factory', 'GrupoController@factory')->name('grupo.factory');
    Route::get('/empleado/factory', 'EmpleadoController@factory')->name('empleado.factory');
    Route::get('/usuario/factory', 'UsuarioController@factory')->name('usuario.factory');
    Route::get('/usuario_cliente/factory', 'UsuarioController@factoryCliente')->name('usuario_cliente.factory');
    Route::get('/usuario_empleado/factory', 'UsuarioController@factoryEmpleado')->name('usuario_empleado.factory');
    Route::get('/unidad/factory', 'UnidadController@factory')->name('unidad.factory');
    Route::get('/marca/factory', 'MarcaController@factory')->name('marca.factory');
    Route::get('/color/factory', 'ColorController@factory')->name('color.factory');
    Route::get('/maquinaria/factory', 'MaquinariaController@factory')->name('maquinaria.factory');
    Route::get('/maquinaria_tipo/factory', 'MaquinariaTipoController@factory')->name('maquinaria_tipo.factory');
    Route::get('/sintoma/factory', 'SintomaController@factory')->name('sintoma.factory');

    //Cruds simples
    Route::resource('localidad', 'LocalidadController');
    Route::resource('clasificacion', 'ClasificacionController');
    Route::resource('sucursal', 'SucursalController');
    Route::resource('taller', 'TallerController');
    Route::resource('cargo', 'CargoController');
    Route::resource('turno', 'TurnoController');
    Route::resource('grupo', 'GrupoController');
    Route::resource('empleado', 'EmpleadoController');
    Route::resource('usuario', 'UsuarioController');
    Route::resource('unidad', 'UnidadController');
    Route::resource('marca', 'MarcaController');
    Route::resource('color', 'ColorController');
    Route::resource('maquinaria', 'MaquinariaController');
    Route::resource('maquinaria_tipo', 'MaquinariaTipoController');
    Route::resource('sintoma', 'SintomaController');

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
