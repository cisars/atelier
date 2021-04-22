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
        $reservas = new Reserva;
        $reservas = Reserva::with('usuario', 'empleado')->get();
        // $reservas = Reserva::all();

        $reservas->each(function ($reserva) {

            foreach ((new Reserva())->getEstados() as $clave => $valor)
                trim($reserva->estado) == trim($valor) ? $reserva->estado = $clave : NULL;

            foreach ((new Reserva())->getFormas() as $clave => $valor)
                trim($reserva->forma_reserva) == trim($valor) ? $reserva->forma_reserva = $clave : NULL;

            foreach ((new Reserva())->getPrioridades() as $clave => $valor)
                trim($reserva->prioridad) == trim($valor) ? $reserva->prioridad = $clave : NULL;
        });

        return view('reserva.index', compact('reservas', $reservas)); // Lista con BelongsTo
    }

    public function create()
    {
        $reservas = Reserva::all();

        $reserva = new Reserva();
        $estados = $reserva->getEstados();
        $formas_reservas = $reserva->getFormas();
        $prioridades = $reserva->getPrioridades();

        $talleres = Taller::all();
        $clientes = Cliente::all();
        $vehiculos = Vehiculo::where('id', 0)->get();
        $empleados = Empleado::all();
        // $usuarios = Usuario::all();
        $formas = $reserva->getFormas(); // forma_reservas
        $taller_id = 0;
        //  $formas_reservas    = (new Reserva())->getFormas();

        if (\Auth::user()->tallerAsignadoExist()) {
            $empleados = Empleado::where('id', \Auth::user()->empleado->id)->get();
            $usuarios = Usuario::where('usuario', \Auth::user()->usuario)->get();
            $talleres = \Auth::user()->tallerAsignadoColl();
            $taller_id = \Auth::user()->tallerAsignadoId();
        }
        // dd($talleres);

        return view('reserva.edit')
            ->with('reserva', $reserva)
            ->with('taller_id', $taller_id)
            ->with('reservas', $reservas)
            ->with('talleres', $talleres)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('empleados', $empleados)
            ->with('usuarios', $usuarios)
            ->with('estados', $estados)
            ->with('formas', $formas)
            ->with('prioridades', $prioridades);

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

        // $res = Reserva::retornaHoraSector($request->get('para_fecha') , $request->get('ticket'));
        // dd($res);

        $reserva = new Reserva([
            'observacion' => $request->get('observacion'),
            'taller_id' => $request->get('taller_id'),
            'cliente_id' => $request->get('cliente_id'),
            'vehiculo_id' => $request->get('vehiculo_id'),
            'empleado_id' => $request->get('empleado_id'),
            'usuario' => $request->get('usuario'),
            'fecha' => $request->get('fecha'),
            'para_fecha' => $request->get('para_fecha'),
            'para_hora' => $request->get('para_hora'),
            'turno' => 0,
            'ticket' => $request->get('ticket'),
            'sector' => $request->get('sector'),
            'estado' => $request->get('estado'),
            'prioridad' => $request->get('prioridad'),
            'forma_reserva' => $request->get('forma_reserva'),
        ]);

        // $reserva = new Reserva($request->all());
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

        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();

        $vehiculos = Vehiculo::where('id', $reserva->vehiculo_id)->get();
        $vehiculos = Vehiculo::where('cliente_id', $reserva->cliente_id)->get();

        $modelos = Modelo::all();

        $empleados = Empleado::all();
        $usuarios = Usuario::whereNotNull('cliente_id');

        $estados = (new Reserva())->getEstados();
        $formas = (new Reserva())->getFormas();
        $prioridades = (new Reserva())->getPrioridades();

        if (\Auth::user()->tallerAsignadoExist()) {
            $empleados = Empleado::where('id', \Auth::user()->empleado->id)->get();
            $usuarios = Usuario::where('usuario', \Auth::user()->usuario)->get();
            $talleres = \Auth::user()->tallerAsignadoColl();
            $taller_id = \Auth::user()->tallerAsignadoId();
        }
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
            'formas',
            'prioridades'
        ))
            ->with('reserva', $reserva)
            ->with('talleres', $talleres)
            ->with('clientes', $clientes)
            ->with('vehiculos', $vehiculos)
            ->with('modelos', $modelos)
            ->with('empleados', $empleados)
            ->with('usuarios', $usuarios)
            ->with('estados', $estados)
            ->with('formas', $formas)
            ->with('prioridades', $prioridades)
            ->with('reserva', $reserva)
            ->with('taller_id', $taller_id);


    }

    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
     $reserva->fill(
         [
             'observacion' => $request->get('observacion'),
             'taller_id' => $request->get('taller_id'),
             'cliente_id' => $request->get('cliente_id'),
             'vehiculo_id' => $request->get('vehiculo_id'),
             'empleado_id' => $request->get('empleado_id'),
             'usuario' => $request->get('usuario'),
             'fecha' => $request->get('fecha'),
             'para_fecha' => $request->get('para_fecha'),
             'para_hora' => $request->get('para_hora'),
             'turno' => 0,
             'ticket' => $request->get('ticket'),
             'sector' => $request->get('sector'),
             'estado' => $request->get('estado'),
             'prioridad' => $request->get('prioridad'),
             'forma_reserva' => $request->get('forma_reserva'),
         ]
     );

        $reserva->save();

        return redirect()
            ->route('reserva.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        $reserva = Reserva::findOrFail($request->id);
        $reserva->delete();

        return redirect()
            ->route('reserva.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
