<?php

namespace App\Http\Controllers;

use App\Http\Requests\Modelo\StoreModeloRequest;
use App\Http\Requests\Modelo\UpdateModeloRequest;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
         $modelos = Modelo::orderBy('descripcion', 'ASC')->get();

        return view('modelo.index', compact('modelos', $modelos)); // Lista con BelongsTo
    }

    public function create()
    {
        if($modelos = Modelo::orderBy('descripcion', 'ASC')->get())
        {
            $marcas = Marca::all();
            return view('modelo.create')
                ->with('modelos', $modelos)
                ->with('marcas', $marcas);
        } else {
        return view('modelo.create') ;
    }
    }

    public function factory()
    {
        factory('App\Models\Modelo')->create();
        return redirect()
            ->route('modelo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreModeloRequest $request)
    {
        $modelo = new Modelo([
            'descripcion' => $request->get('descripcion'),
            'marca_id' => $request->get('marca_id'),
        ]);
        $modelo->save();
        return redirect()
            ->route('modelo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(Modelo $modelo)
    {
        //
    }

    public function edit(Modelo $modelo)
    {
        $marcas = Marca::orderBy('descripcion', 'ASC')->get();
        return view('modelo.edit')
            ->with('modelo',$modelo)
            ->with('marcas',$marcas);
    }

    public function update(UpdateModeloRequest $request, Modelo $modelo)
    {
        $modelo->fill($request->all());
        $modelo->save();

        return redirect()
            ->route('modelo.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        $modelo = Modelo::findOrFail($request->id);
            $modelo->delete();

            return redirect()
                ->route('modelo.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
    }
}
