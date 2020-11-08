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

        $usuarios = Usuario::all();
        $empleados = Empleado::all();
        return View::make('home')
            ->with('usuarios', $usuarios)
            ->with('empleados', $empleados);
    }
}
