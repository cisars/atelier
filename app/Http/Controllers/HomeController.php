<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Http\Request;
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
        Log::info('USUARIO_INACTIVO 		'.' - '. Usuario::USUARIO_INACTIVO 						);
        Log::info('USUARIO_T_CLIENTE   		'.' - '. Usuario::USUARIO_T_CLIENTE   					);
        Log::info('USUARIO_T_EMPLEADO  		'.' - '. Usuario::USUARIO_T_EMPLEADO  					);
        Log::info('USUARIO_ADMIN         	'.' - '. Usuario::USUARIO_ADMIN         				);
        Log::info('USUARIO_FUNCIONARIO   	'.' - '. Usuario::USUARIO_FUNCIONARIO   				);
        Log::info('USUARIO_CLIENTE       	'.' - '. Usuario::USUARIO_CLIENTE       				);
        Log::info('USUARIO_BOOTSTRAP     	'.' - '. Usuario::USUARIO_BOOTSTRAP     				);
        Log::info('USUARIO_RECEPCIONISTA 	'.' - '. Usuario::USUARIO_RECEPCIONISTA 				);
        $usuarios = Usuario::all();
        $empleados = Empleado::all();
        return View::make('home')
            ->with('usuarios', $usuarios)
            ->with('empleados', $empleados);
    }
}
