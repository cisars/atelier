<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Color;
use App\Models\Empleado;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        Log::info('USUARIO_ACTIVO 			'.' - '. Usuario::USUARIO_ACTIVO 						);

         if( trim(Auth::user()->perfil) == 'A' || trim(Auth::user()->perfil) == 'F'   )
         {
             $usuarios = Usuario::all();
             $empleados = Empleado::all();
             return View::make('home')
                 ->with('usuarios', $usuarios)
                 ->with('empleados', $empleados);
         }

        if( trim(Auth::user()->perfil) == 'C' )
        {

      //  dd( Marca::where('descripcion', 'Hyundai')->first()->id);
 //           dd(Cliente::find(Auth::user()->cliente_id)->vehiculos );
//            dd( Auth::user()->cliente::with('vehiculos'  )->get());
//            $usuario = Auth::user()->cliente;


//            $vehiculos = Vehiculo::all()->pluck('marca_modelo', 'id');
//            dd($vehiculos);
//

            $cliente = Cliente::with('vehiculos')->where('id', Auth::user()->cliente_id)->first();
            //dd($cliente->vehiculos->pluck('marca_modelo', 'id'));

            $vehiculos = $cliente->vehiculos->pluck('marca_modelo', 'id');
            //$vehiculos = Vehiculo::first();

            return View::make('web.panelcliente')
                ->with('vehiculos', $vehiculos) ;
        }



    }
    public function misvehiculos()
    {

        if( trim(Auth::user()->perfil) == 'A' )
        {
            $usuarios = Usuario::all();
            $empleados = Empleado::all();
            return View::make('home')
                ->with('usuarios', $usuarios)
                ->with('empleados', $empleados);
        }

        if( trim(Auth::user()->perfil) == 'C' )
        {
            $usuarios = Usuario::all();
            $vehiculos = Vehiculo::all();
            return  View::make('web.misvehiculos')
                ->with('usuarios', $usuarios)
                ->with('vehiculos', $vehiculos)
                ;
        }

    }

    public function mivehiculo()
    {


        if( trim(Auth::user()->perfil) == 'C' )
        {
            $usuarios = Usuario::all();
            $vehiculos = Vehiculo::all();

            $vehiculo   = new Vehiculo();
            $combustiones    = $vehiculo->getCombustiones();
            $tipos    = $vehiculo->getTipos();

            $clientes = Cliente::all();
            $modelos = Modelo::all();
            $colores = Color::all();
            return  View::make('web.mivehiculo')
                ->with('vehiculos', $vehiculos)
                ->with('clientes', $clientes)
                ->with('modelos', $modelos)
                ->with('colores', $colores)
                ->with('combustiones', $combustiones)
                ->with('tipos', $tipos)
                ;

        }

    }
}
