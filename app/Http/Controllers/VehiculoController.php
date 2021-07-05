<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehiculo\StoreVehiculoRequest;
use App\Http\Requests\Vehiculo\UpdateVehiculoRequest;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Modelo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{

    public function index()
    {
        $vehiculos = Vehiculo::all();

        $vehiculos->each(function($vehiculo)
        {
//            $vehiculo->cliente = Cliente::find($vehiculo->cliente);
//            $vehiculo->modelo = Modelo::find($vehiculo->modelo);
//            $vehiculo->color = Color::find($vehiculo->color);

            foreach ((new Vehiculo())->getCombustiones() as $clave=>$valor)
                trim($vehiculo->combustion) == trim($valor) ? $vehiculo->combustion = $clave : NULL ;

            foreach ((new Vehiculo())->getTipos() as $clave=>$valor)
                trim($vehiculo->tipo) == trim($valor) ? $vehiculo->tipo = $clave : NULL ;

        });

        return view('vehiculo.index', compact('vehiculos', $vehiculos)); // Lista con BelongsTo
    }

    public function create()
    {
            $vehiculos = Vehiculo::all();
            $vehiculo   = new Vehiculo();
            $combustiones    = $vehiculo->getCombustiones();
            $tipos    = $vehiculo->getTipos();
            $clientes = Cliente::all();
            $modelos = Modelo::all();
            $colores = Color::all();
            return view('vehiculo.edit')
                ->with('vehiculos', $vehiculos)
                ->with('vehiculo', $vehiculo)
                ->with('clientes', $clientes)
                ->with('modelos', $modelos)
                ->with('colores', $colores)
                ->with('combustiones', $combustiones)
                ->with('tipos', $tipos)
                ;

    }
    public function edit(Vehiculo $vehiculo)
    {

        $vehiculos = Vehiculo::all();
        $combustiones    = $vehiculo->getCombustiones();
        $tipos    = $vehiculo->getTipos();
        $clientes = Cliente::all();
        $modelos = Modelo::all();
        $colores = Color::all();
        return view('vehiculo.edit')
            ->with('vehiculos',$vehiculos)
            ->with('vehiculo',$vehiculo)
            ->with('clientes',$clientes)
            ->with('modelos',$modelos)
            ->with('colores',$colores)
            ->with('combustiones', $combustiones)
            ->with('tipos', $tipos)
            ;
    }

    public function factory()
    {
        factory('App\Models\Vehiculo')->create();
        return redirect()
            ->route('vehiculo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreVehiculoRequest $request)
    {
       // $vehiculo = new Vehiculo($request->all());
        $vehiculo = new Vehiculo([
            'cliente_id' => $request->get('cliente_id'),
            'modelo_id' => $request->get('modelo_id'),
            'chapa' => $request->get('chapa'),
            'chasis' => $request->get('chasis'),
            'color_id' => $request->get('color_id'),
            'combustion' => $request->get('combustion'),
            'tipo' => $request->get('tipo'),
            'año' => $request->get('año')

        ]);
      //  dd($request);
        $vehiculo->save();
        return redirect()
            ->route('vehiculo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Vehiculo $vehiculo)
    {
        //
    }



    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {

         $vehiculo->fill($request->all());
//
//        $vehiculo = [
//            'cliente_id' => $request->get('cliente_id'),
//            'modelo_id' => $request->get('modelo_id'),
//            'chapa' => $request->get('chapa'),
//            'chasis' => $request->get('chasis'),
//            'color_id' => $request->get('color_id'),
//            'combustion' => $request->get('combustion'),
//            'tipo' => $request->get('tipo'),
//            'año' => $request->get('año')
//        ];

        $vehiculo->save();

        return redirect()
            ->route('vehiculo.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        try {

        $vehiculo = Vehiculo::findOrFail($request->id);
        $vehiculo->delete();

        return redirect()
            ->route('vehiculo.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
           } catch (\Illuminate\Database\QueryException $e) {
               dd($e);
               return redirect()->route('vehiculo.index')->with('error', $e->getMessage());
           }
    }

}
