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

    //GENISA
    Route::post('/maketemplatecontroller/toFile/', 'MakeTemplateController@toFile')->name('maketemplatecontroller.toFile');
    Route::post('/maketemplatecontroller/inicializar/', 'MakeTemplateController@inicializar')->name('maketemplatecontroller.inicializar');
    //------

    //Matriz de Generadores
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/listausuarios', 'UsuarioController@index')->name('listausuarios');
    Route::get('/maketemplate', 'MakeTemplateController@index')->name('maketemplate');
    Route::get('/empleadogen', 'EmpleadoGen@index')->name('empleadogen');
    Route::get('/clientegen', 'ClienteGen@index')->name('clientegen');
    Route::get('/producto_serviciogen', 'ProductoServicioGen@index')->name('producto_serviciogen');
    Route::get('/parametrogen', 'ParametroGen@index')->name('parametrogen');
    Route::get('/descansogen', 'DescansoGen@index')->name('descansogen');
    Route::get('/reservagen', 'ReservaGen@index')->name('reservagen');
    Route::get('/recepciongen', 'RecepcionGen@index')->name('recepciongen');

    Route::get('/orden_repuestogen', 'OrdenRepuestoGen@index')->name('orden_repuestogen');
    Route::get('/orden_serviciogen', 'OrdenServicioGen@index')->name('orden_serviciogen');
    Route::get('/orden_trabajogen', 'OrdenTrabajoGen@index')->name('orden_trabajogen');

    Route::get('/feriadogen', 'FeriadoGen@index')->name('feriadogen');
    Route::get('/entradagen', 'EntradaGen@index')->name('entradagen');
    Route::get('/entrada_detallegen', 'EntradaDetalleGen@index')->name('entrada_detallegen');
    Route::get('/orden_mecanicogen', 'OrdenMecanicoGen@index')->name('orden_mecanicogen');
    Route::get('/empleado_maquinagen', 'EmpleadoMaquinaGen@index')->name('empleado_maquinagen');
    Route::get('/facturagen', 'FacturaGen@index')->name('facturagen');
    Route::get('/factura_detallegen', 'FacturaDetalleGen@index')->name('factura_detallegen');
    Route::get('/entregagen', 'EntregaGen@index')->name('entregagen');


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
  //  Route::get('/maquinaria/show/{$maquinaria}/', 'MaquinariaController@show')->name('maquinaria.show');
    Route::get('/maquinaria_tipo/factory', 'MaquinariaTipoController@factory')->name('maquinaria_tipo.factory');
    Route::get('/sintoma/factory', 'SintomaController@factory')->name('sintoma.factory');
    Route::get('/modelo/factory', 'ModeloController@factory')->name('modelo.factory');
    Route::get('/sector/factory', 'SectorController@factory')->name('sector.factory');
    Route::get('/vehiculo/factory', 'VehiculoController@factory')->name('vehiculo.factory');
    Route::get('/reserva/factory', 'ReservaController@factory')->name('reserva.factory');
    Route::get('/cliente/factory', 'ClienteController@factory')->name('cliente.factory');
    Route::get('/producto_servicio/factory', 'ProductoServicio@factory')->name('producto_servicio.factory');
    Route::get('/parametro/factory', 'Parametro@factory')->name('parametro.factory');
    Route::get('/descanso/factory', 'Descanso@factory')->name('descanso.factory');
    Route::get('/recepcion/factory', 'Recepcion@factory')->name('recepcion.factory');

    Route::get('/feriado/factory', 'Feriado@factory')->name('feriado.factory');
    Route::get('/orden_trabajo/factory', 'OrdenTrabajo@factory')->name('orden_trabajo.factory');

    Route::get('/entrada/factory', 'Entrada@factory')->name('entrada.factory');
    Route::get('/entrada_detalle/factory', 'EntradaDetalle@factory')->name('entrada_detalle.factory');
    Route::get('/orden_mecanico/factory', 'OrdenMecanico@factory')->name('orden_mecanico.factory');
    Route::get('/empleado_maquina/factory', 'EmpleadoMaquina@factory')->name('empleado_maquina.factory');
    Route::get('/factura/factory', 'Factura@factory')->name('factura.factory');
    Route::get('/factura_detalle/factory', 'FacturaDetalle@factory')->name('factura_detalle.factory');
    Route::get('/entrega/factory', 'Entrega@factory')->name('entrega.factory');

    //Validaciones request
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
    Route::resource('maquinaria' , 'MaquinariaController');
    Route::resource('maquinaria_tipo', 'MaquinariaTipoController');
    Route::resource('sintoma', 'SintomaController');
    Route::resource('modelo', 'ModeloController');
    Route::resource('sector', 'SectorController');
    Route::resource('vehiculo', 'VehiculoController');
    Route::resource('reserva', 'ReservaController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('producto_servicio', 'ProductoServicioController');
    Route::resource('parametro', 'ParametroController');
    Route::resource('descanso', 'DescansoController');
    Route::resource('recepcion', 'RecepcionController');
    Route::resource('orden_repuesto', 'OrdenRepuestoController');
    Route::resource('orden_servicio', 'OrdenServicioController');
    Route::resource('orden_trabajo', 'OrdenTrabajoController');

    Route::resource('feriado', 'FeriadoController');
    Route::resource('entrada', 'EntradaController');
    Route::resource('entrada_detalle', 'EntradaDetalleController');
    Route::resource('orden_mecanico', 'OrdenMecanicoController');
    Route::resource('empleado_maquina', 'EmpleadoMaquinaController');
    Route::resource('factura', 'FacturaController');
    Route::resource('factura_detalle', 'FacturaDetalleController');
    Route::resource('entrega', 'EntregaController');
});

// Rutas de los examples pages bootstrap.
// Resources/views/vendor/adminlte/pages agregados a mano
Route::view('/usuario.email.check', 'usuario.email.check')->name('usuario.email.check');

Route::get('/parabusqueda',  'ParaBusquedaController@index')->name('parabusqueda');

Route::view('/inicio', 'web.index')->name('inicio');
Route::view('/agendamiento', 'web.agendamiento')->name('agendamiento');
Route::view('/reservaenlinea', 'web.reservaenlinea')->name('reservaenlinea');
Route::view('/lineatiempo', 'web.lineatiempo')->name('lineatiempo');
Route::view('/panelcliente', 'web.panelcliente')->name('panelcliente');
Route::view('/midiagnostico', 'web.midiagnostico')->name('midiagnostico');
Route::get('/misvehiculos',  'HomeController@misvehiculos')->name('misvehiculos');
Route::get('/mivehiculo',  'HomeController@mivehiculo')->name('mivehiculo');



//Route::get('/inicio',  'BootstrapExampleController@inicio')->name('inicio');
Route::get('/enviartodo',  'BootstrapExampleController@enviartodo')->name('enviartodo');


Route::get('/chartjs',  'BootstrapExampleController@chartjs')->name('chartjs');
Route::get('/flot',     'BootstrapExampleController@flot')->name('flot');
Route::get('/inline',   'BootstrapExampleController@inline')->name('inline');
Route::get('/data',     'BootstrapExampleController@data')->name('data');
//Route::get('/tuindex',     'BootstrapExampleController@data')->name('tuindex');
Route::view('/tallerusuario', 'talleres_usuarios/index')->name('tallerusuario');
Route::view('/tallerusuario/create', 'talleres_usuarios/create')->name('tallerusuario.create');

 Route::view('/tucreate', 'talleres_usuarios/create');
 Route::view('/_reservanormal', '_reservanormal/index')->name('_reservanormal');
 Route::view('/_reservanormalc', '_reservanormal/edit');
Route::view('/_reservalinea', '_reservalinea/index')->name('_reservalinea');
Route::view('/_reservalineac', '_reservalinea/edit');
Route::view('/_confirmacionot', '_confirmacionot/index')->name('_confirmacionot');
Route::view('/_confirmacionotc', '_confirmacionot/edit');
Route::view('/_sectorrepuesto', '_sectorrepuesto/index')->name('_sectorrepuesto');
Route::view('/_sectorrepuestoc', '_sectorrepuesto/edit');
Route::view('/_entradarepuesto', '_entradarepuesto/index')->name('_entradarepuesto');
Route::view('/_entradarepuestoc', '_entradarepuesto/edit');
Route::view('/_salidarepuesto', '_salidarepuesto/index')->name('_salidarepuesto');
Route::view('/_salidarepuestoc', '_salidarepuesto/edit');
Route::view('/_asignacionamaquinaria', '_asignacionamaquinaria/index')->name('_asignacionamaquinaria');
Route::view('/_asignacionamaquinariac', '_asignacionamaquinaria/edit');
Route::view('/_recepcionvehiculo', '_recepcionvehiculo/index')->name('_recepcionvehiculo');
Route::view('/_recepcionvehiculoc', '_recepcionvehiculo/edit');
Route::view('/_calendarioatencion', '_calendarioatencion/index')->name('_calendarioatencion');
Route::view('/_calendarioatencionc', '_calendarioatencion/edit');
Route::view('/_realizacionot', '_realizacionot/index')->name('_realizacionot');
Route::view('/_realizacionotc', '_realizacionot/edit');
Route::view('/_finalizacionot', '_finalizacionot/index')->name('_finalizacionot');
Route::view('/_finalizacionotc', '_finalizacionot/edit');
Route::view('/_verificacionot', '_verificacionot/index')->name('_verificacionot');
Route::view('/_verificacionotc', '_verificacionot/edit');
Route::view('/_entregavehiculo', '_entregavehiculo/index')->name('_entregavehiculo');
Route::view('/_entregavehiculoc', '_entregavehiculo/edit');
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
