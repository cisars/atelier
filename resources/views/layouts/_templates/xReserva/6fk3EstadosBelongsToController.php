<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Models\Taller;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Models\ZZFK6ZZ;
use App\Http\Requests\Reserva\StoreReservaRequest;
use App\Http\Requests\Reserva\UpdateReservaRequest;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::orderBy('descripcion', 'ASC')->get();

        $reservas->each(function($reserva)
        {
            $reserva->taller = Taller::find($reserva->taller);
            $reserva->cliente = Cliente::find($reserva->cliente);
            $reserva->vehiculo = Vehiculo::find($reserva->vehiculo);
            $reserva->empleado = Empleado::find($reserva->empleado);
            $reserva->usuario = Usuario::find($reserva->usuario);
            $reserva->ZZfk6ZZ = ZZFK6ZZ::find($reserva->ZZfk6ZZ);

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
        $reservas = Reserva::orderBy('descripcion', 'ASC')->get();

            $reserva   = new Reserva();
            $estados    = $reserva->getEstados();
            $formas_reservas    = $reserva->getFormas();
            $prioridades    = $reserva->getPrioridades();

            $talleres = Taller::all();
            $clientes = Cliente::all();
            $vehiculos = Vehiculo::all();
            $empleados = Empleado::all();
            $usuarios = Usuario::all();
            $ZZfks6ZZ = ZZFK6ZZ::all();
            return view('reserva.create')
                ->with('reservas', $reservas)
                ->with('talleres', $talleres)
                ->with('clientes', $clientes)
                ->with('vehiculos', $vehiculos)
                ->with('empleados', $empleados)
                ->with('usuarios', $usuarios)
                ->with('ZZfks6ZZ', $ZZfks6ZZ)
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
        $reserva = new Reserva([
            'descripcion' => $request->get('descripcion'),
            'taller' => $request->get('taller'),
            'cliente' => $request->get('cliente'),
            'vehiculo' => $request->get('vehiculo'),
            'empleado' => $request->get('empleado'),
            'usuario' => $request->get('usuario'),
            'ZZfk6ZZ' => $request->get('ZZfk6ZZ'),
            'estado' => $request->get('estado'),
            'forma_reserva' => $request->get('forma_reserva'),
            'prioridad' => $request->get('ZZestado3ZZ'),
        ]);

        //        $reserva = new Reserva($request->all());
        //        $reserva->save();

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
        $clientes = Cliente::orderBy('descripcion', 'ASC')->get();
        $vehiculos = Vehiculo::orderBy('descripcion', 'ASC')->get();
        $empleados = Empleado::orderBy('descripcion', 'ASC')->get();
        $usuarios = Usuario::orderBy('descripcion', 'ASC')->get();
        $ZZfks6ZZ = ZZFK6ZZ::orderBy('descripcion', 'ASC')->get();

        $estados = $reserva->getEstados();
        $formas_reservas = $reserva->getFormas();
        $prioridades = $reserva->getPrioridades();

        return view('reserva.edit')
            ->with('reserva',$reserva)
            ->with('talleres',$talleres)
            ->with('clientes',$clientes)
            ->with('vehiculos',$vehiculos)
            ->with('empleados',$empleados)
            ->with('usuarios',$usuarios)
            ->with('ZZfks6ZZ',$ZZfks6ZZ)
            ->with('estados', $estados)
            ->with('formas_reservas', $formas_reservas)
            ->with('prioridades', $prioridades)
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
