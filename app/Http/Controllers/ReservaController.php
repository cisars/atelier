<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Models\Taller;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Http\Requests\Reserva\StoreReservaRequest;
use App\Http\Requests\Reserva\UpdateReservaRequest;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas =  new Reserva ;
        $reservas =  Reserva::all();
        // $reservas = Reserva::all();

        $reservas->each(function($reserva)
        {
//            $reserva->taller = Taller::find($reserva->taller);
//            $reserva->cliente = Cliente::find($reserva->cliente);
//            $reserva->vehiculo = Vehiculo::find($reserva->vehiculo);
//
//
//            $reserva->empleado = Empleado::find($reserva->empleado);
//            $reserva->usuario = Usuario::find($reserva->usuario);

            foreach ((new Reserva())->getEstados() as $clave=>$valor)
                trim($reserva->estado) == trim($valor) ? $reserva->estado = $clave : NULL ;

            foreach ((new Reserva())->getFormas() as $clave=>$valor)
                trim($reserva->forma_reserva) == trim($valor) ? $reserva->forma_reserva = $clave : NULL ;

            foreach ((new Reserva())->getPrioridades() as $clave=>$valor)
                trim($reserva->prioridad) == trim($valor) ? $reserva->prioridad = $clave : NULL ;
        });

        return view('reserva.index', compact('reservas', $reservas)); // Lista con BelongsTo
    }

    public function create()
    {
        $reservas = Reserva::all();

        $reserva   = new Reserva();
        $estados    = $reserva->getEstados();
        $formas_reservas    = $reserva->getFormas();
        $prioridades    = $reserva->getPrioridades();

        $talleres = Taller::all();
        $clientes = Cliente::all();
        $vehiculos = Vehiculo::all();
        $empleados = Empleado::all();
        $usuarios = Usuario::all();
        return view('reserva.create')
            ->with('reservas', $reservas)
            ->with('talleres', $talleres)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('empleados', $empleados)
            ->with('usuarios', $usuarios)
            ->with('estados', $estados)
            ->with('formas_reservas', $formas_reservas)
            ->with('prioridades', $prioridades)
            ;

    }

    public function factory()
    {
        factory('App\Models\Reserva')->create();
        return redirect()
            ->route('reserva.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreReservaRequest $request)
    {
//        $reserva = new Reserva([
//            'descripcion' => $request->get('descripcion'),
//            'taller' => $request->get('taller'),
//            'cliente' => $request->get('cliente'),
//            'vehiculo' => $request->get('vehiculo'),
//            'empleado' => $request->get('empleado'),
//            'usuario' => $request->get('usuario'),
//            'ZZfk6ZZ' => $request->get('ZZfk6ZZ'),
//            'estado' => $request->get('estado'),
//            'forma_reserva' => $request->get('forma_reserva'),
//            'prioridad' => $request->get('ZZestado3ZZ'),
//        ]);

        $reserva = new Reserva($request->all());
        $reserva->save();

        $reserva->save();
        return redirect()
            ->route('reserva.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Reserva $reserva)
    {
        //
    }

    public function edit(Reserva $reserva)
    {
        //dd($reserva);
     //   $reserva = Reserva::with('vehiculo')->where('reserva', $reserva->reserva)->first();
        //$reserva = Reserva::with('vehiculo')->where('reserva', $reserva->reserva)->first();
        //$reserva = Reserva::with('fvehiculo.fmodelo.fmarca')->get();
        //$reserva = Reserva::find($reserva);

        //dd( $reserva->fvehiculo->fmodelo->fmarca  );
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();


        $vehiculos = Vehiculo::pluck('chapa', 'vehiculo');

        //dd($vehiculos);

        //dd($vehiculos);

        $modelos = Modelo::pluck('modelo', 'descripcion');

        $empleados = Empleado::orderBy('apellidos', 'ASC')->pluck('nombres', 'empleado');
        $usuarios = Usuario::orderBy('usuario', 'ASC')->pluck('usuario', 'usuario');

        $estados            = (new Reserva())->getEstados();
        //dd($estados);
        $formas_reservas    = (new Reserva())->getFormas();
        $prioridades        = (new Reserva())->getPrioridades();


        //dd($reserva);

        return view('reserva.edit', compact(
            'reserva',
            'talleres',
            'clientes',
            'vehiculos',
            'modelos',
            'empleados',
            'usuarios',
            'estados',
            'formas_reservas',
            'prioridades'
        ))
//            ->with('reserva',$reserva)
//            ->with('talleres',$talleres)
//            ->with('clientes',$clientes)
//            ->with('vehiculos',$vehiculos)
//            ->with('modelos',$modelos)
//            ->with('empleados',$empleados)
//            ->with('usuarios',$usuarios)
//            ->with('estados', $estados)
//            ->with('formas_reservas', $formas_reservas)
//            ->with('prioridades', $prioridades)
            ;
    }

    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        $reserva->fill($request->all());
        $reserva->save();

        return redirect()
            ->route('reserva.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        $reserva = Reserva::findOrFail($request->reserva);
        $reserva->delete();

        return redirect()
            ->route('reserva.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
