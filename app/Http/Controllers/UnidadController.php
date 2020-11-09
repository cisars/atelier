<?php

namespace App\Http\Controllers;

use App\Http\Requests\Unidad\StoreUnidadRequest;
use App\Http\Requests\Unidad\UpdateUnidadRequest;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UnidadController extends Controller
{

    public function index()
    {
        $unidades = Unidad::all();
        return View::make('unidad.index')
            ->with('unidades', $unidades);
    }
    public function create()
    {
        if($unidades = Unidad::orderBy('descripcion', 'ASC')->get())
        return view('unidad.create')
            ->with('unidades', $unidades);
        else
            return view('unidad.create') ;
    }

    public function factory()
    {
        factory('App\Models\Unidad')->create();
        return redirect()
            ->route('unidad.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreUnidadRequest $request)
    {

        $unidad = new Unidad([
            'descripcion' => $request->get('descripcion'),
            'sigla' => $request->get('sigla')
        ]);
        $unidad->save();
        return redirect()
            ->route('unidad.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(Unidad $unidad)
    {
        //
    }

    public function edit(Unidad $unidad)
    {
        return view('unidad.edit')
            ->with('unidad',$unidad) ;
    }

    public function update(UpdateUnidadRequest $request, Unidad $unidad)
    {

        $unidad->fill($request->all());
        $unidad->save();

        return redirect()
            ->route('unidad.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
    $unidad = Unidad::findOrFail($request->unidad);
        $unidad->delete();

        return redirect()
            ->route('unidad.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
