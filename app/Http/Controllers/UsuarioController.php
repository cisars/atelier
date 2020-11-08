<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
private  $newUsuario  ;
private  $getPerfil  ;
    public function index()
    {

        $usuarios = Usuario::all();
        $this->newUsuario = new Usuario();
        $this->getPerfil = $this->newUsuario->getPerfiles();


        $usuarios->each(function($usuario)
        {
            $usuario->empleado = Empleado::find($usuario->empleado);
            $usuario->cliente = Cliente::find($usuario->cliente);

            ($usuario->estado == Usuario::USUARIO_ACTIVO        ) ? $usuario->estado = 'Activo' : $usuario->estado = 'Inactivo' ;

            foreach ($this->getPerfil as $clave=>$valor)
            {
                Log::info('usuario->perfil bucle:'. $usuario->perfil	);
                Log::info(Log::info(" datos bucle  { $clave } => [ $valor ]"		    ); ;

                if( $usuario->perfil == $valor ){
                    Log::info('-------------$this->getPerfil as $clave=>$valor---------------------------------'	);
                    Log::info("AntesDe: $usuario->perfil"		    );

                    $usuario->perfil = $clave;

                    Log::info("clave{ $clave } - valor{ $valor }"		    );
                    Log::info("Guardado: $usuario->perfil"		    );
                }


            }

            ($usuario->tipo == Usuario::USUARIO_T_CLIENTE      ) ? $usuario->tipo = 'Cliente' : $usuario->tipo  = 'Empleado';
//
//
//            Log::info('usuario->usuario		      === '. $usuario->usuario				    );
//            Log::info('usuario->estado 			  === '. $usuario->estado				    );
//            Log::info('usuario->perfil 			  === '. $usuario->perfil				    );
//            Log::info('usuario->tipo 			  === '. $usuario->tipo						);
//            Log::info('####################################################################'						);
        });



        return view('usuario.index', compact('usuarios', $usuarios));

    }
    public function create()
    {
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();

        $usuario    = new Usuario();
        $estados    = $usuario->getEstados();
        $perfiles   = $usuario->getPerfiles();
        $tipos      = $usuario->getTipos();

        return view('usuario.create')
            ->with('empleados', $empleados)
            ->with('clientes', $clientes)
            ->with('usuario', $usuario)
            ->with('estados', $estados)
            ->with('perfiles', $perfiles)
            ->with('tipos', $tipos) ;
    }
    public function factory()
    {
        factory('App\Models\Usuario')->create();
        return redirect()
            ->route('usuario.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
    public function factoryCliente()
    {
        factory('App\Models\Usuario')->create( [
            'cliente' => factory('App\Models\Cliente')->create()->cliente
        ] );
        return redirect()
            ->route('usuario.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
    public function factoryEmpleado()
    {
        factory('App\Models\Usuario')->create( [
            'empleado' => factory('App\Models\Empleado')->create()->empleado
        ] );
        return redirect()
            ->route('usuario.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreUsuarioRequest $request)
    {
//        $user = Usuario::findOrFail($request->usuario);
//
//        // Validate the new password length...
//
//        $user->fill([
//            'password' => Hash::make($request->newPassword)
//        ])->save();
        $usuario = new Usuario($request->all());
        $usuario['clave'] = Hash::make($request['clave']);
        $usuario['fecha_ingreso'] = now();
        $usuario->save();
        return redirect()
            ->route('usuario.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Usuario $usuario)
    {
        //
    }

    public function edit(Usuario $usuario)
    {

        $usuario  = Usuario::find($usuario->usuario);
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();

        $estados = $usuario->getEstados();
        $tipos = $usuario->getTipos();
        $perfiles = $usuario->getPerfiles();

        return view('usuario.edit')
            ->with('usuario', $usuario)
            ->with('empleados', $empleados)
            ->with('clientes', $clientes)
            ->with('estados', $estados)
            ->with('tipos', $tipos)
            ->with('perfiles', $perfiles)
            ->with('empleados', $empleados);
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
//        $request->validate([
//
//            'current_password' => ['required', new MatchOldPassword],
//
//            'new_password' => ['required'],
//
//            'new_confirm_password' => ['same:new_password'],
//
//        ]);
//
//
//
//        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
//
//
//
//        dd('Password change successfully.');
//
//                    dd($usuario);
//                    $usuario['clave'] = Hash::make($request['clave']);
//                    $usuario->fill($request->all());
//                    $usuario->save();

        return redirect()
            ->route('usuario.index')
            ->with('msg', 'Seccion en mantenimiento')
            ->with('type', 'warning');

    }

    public function destroy(Request $request)
{
    $usuario = Usuario::findOrFail($request->usuario);
        $usuario->delete();

        return redirect()
            ->route('usuario.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }

}
