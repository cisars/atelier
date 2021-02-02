<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Taller;
use App\Models\TalleresUsuarios;
use App\Models\Usuario;
use App\Mail\EmailCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class UsuarioController extends Controller
{
    private  $newUsuario  ;
    private  $getEstado  ;
    private  $getPerfil  ;
    private  $getTipo  ;
    public function index()
    {

        $usuarios = Usuario::all();
        $this->newUsuario = new Usuario();
        $this->getPerfil = $this->newUsuario->getPerfiles();
        $this->getTipo = $this->newUsuario->getTipos();
        $this->getEstado = $this->newUsuario->getEstados();

        $usuarios->each(function($usuario)
        {
//            $usuario->empleado = Empleado::find($usuario->empleado);
//            $usuario->cliente = Cliente::find($usuario->cliente);

            foreach ($this->getPerfil as $clave=>$valor)
              if( trim($usuario->perfil) == trim($valor) )
                    $usuario->perfil = $clave;

            foreach ($this->getTipo as $clave=>$valor)
                if( trim($usuario->tipo) == trim($valor) )
                    $usuario->tipo = $clave;

            foreach ($this->getEstado as $clave=>$valor)
                if( trim($usuario->estado) == trim($valor) )
                    $usuario->estado = $clave;

        });

        return view('usuario.index', compact('usuarios', $usuarios));

    }
    public function create()
    {
        $empleados = Empleado::orderBy('apellidos', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();

        $empleados = Empleado::all()->pluck('full_name', 'id');

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
            ->with('talleres', $talleres)
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
//dd($request->email);
        try {
            DB::beginTransaction();
            $usuario = new Usuario($request->only(
                ['usuario',
                    'empleado_id',
                    'cliente_id',
                    'clave',
                    'fecha_ingreso',
                    'estado',
                    'observacion',
                    'perfil',
                    'tipo',
                    'usuario_verified_at',
                    'remember_token',
                    'mailtoken',
                    'created_at',
                    'updated_at']));
            $usuario->mailtoken = $request->_token;
            //$usuario->token = Str::uuid();
            $usuario->clave = Hash::make($request->clave);
            $usuario->fecha_ingreso = now();
            $usuario->save();

            Mail::to(trim($request->email))->send(new EmailCheck($usuario->mailtoken));



           // dd($request->all());
            foreach ($request->taller_id as $item) {
                $talleresusuarios = new TalleresUsuarios();
                $talleresusuarios->taller_id    = $item;
                $talleresusuarios->usuario      = $usuario->usuario;
//                dd($talleresusuarios);
                $talleresusuarios->save();
            }

            DB::commit();

        } catch ( Exception $e){
            DB::rollBack();
        }

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
