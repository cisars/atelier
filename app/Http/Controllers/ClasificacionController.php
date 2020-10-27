<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clasificacion\StoreClasificacionRequest;
use App\Http\Requests\Clasificacion\UpdateClasificacionRequest;
use App\Models\Clasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClasificacionController extends Controller
{

    public function index()
    {
        $clasificaciones = Clasificacion::all();
        return View::make('clasificacion.index')
            ->with('clasificaciones', $clasificaciones);
    }
    public function create()
    {
        if($clasificaciones = Clasificacion::orderBy('descripcion', 'ASC')->get())
        return view('clasificacion.create')
            ->with('clasificaciones', $clasificaciones);
        else
            return view('clasificacion.create') ;
    }

    public function factory()
    {
        factory('App\Models\Clasificacion')->create();
        return redirect()
            ->route('clasificacion.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreClasificacionRequest $request)
    {

        $clasificacion = new Clasificacion([
            'descripcion' => $request->get('descripcion')
        ]);
        $clasificacion->save();
        return redirect()
            ->route('clasificacion.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Clasificacion $clasificacion)
    {
        //
    }

    public function edit(Clasificacion $clasificacion)
    {
        return view('clasificacion.edit')
            ->with('clasificacion',$clasificacion) ;
    }

    public function update(UpdateClasificacionRequest $request, Clasificacion $clasificacion)
    {

        $clasificacion->fill($request->all());
        $clasificacion->save();

        return redirect()
            ->route('clasificacion.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        // try {
        $clasificacion = Clasificacion::findOrFail($request->clasificacion);
        $clasificacion->delete();

        return redirect()
            ->route('clasificacion.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
        //   } catch (\Illuminate\Database\QueryException $e) {
        //       //dd($e);
        //       return redirect()->route('clasificacion.index')->with('error', $e->getMessage());
        //   }

    }
}
