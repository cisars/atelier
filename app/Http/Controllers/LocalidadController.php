<?php

namespace App\Http\Controllers;

use App\Http\Requests\Localidad\StoreLocalidadRequest;
use App\Http\Requests\Localidad\UpdateLocalidadRequest;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LocalidadController extends Controller
{

    public function index()
    {
        $localidades = Localidad::all();
        return View::make('localidad.index')
            ->with('localidades', $localidades);
    }
    public function create()
    {
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        return view('localidad.create')
            ->with('localidades', $localidades);
    }

    public function store(StoreLocalidadRequest $request)
    {
        $localidad = new Localidad([
            'descripcion' => $request->get('descripcion')
        ]);
        $localidad->save();
        return redirect('/localidad')
            ->with('success', 'Localidad grabado correctamente');
    }

    public function show(Localidad $localidad)
    {
        //
    }

    public function edit(Localidad $localidad)
    {
        return view('localidad.edit')
            ->with('localidad',$localidad) ;
    }

    public function update(UpdateLocalidadRequest $request, Localidad $localidad)
    {
        $localidad->fill($request->all());
        $localidad->save();
       // return redirect( '/localidad');
       // return redirect( '/localidad')->with('success', 'Localidad actualizada correctamente');
        return redirect(route('localidad.index'))
            ->with('success', 'Localidad actualizada correctamente');
    }

    public function destroy(Request $request)
    {
        // try {
        $localidad = Localidad::findOrFail($request->id);
        $localidad->delete();
        return redirect()->route('localidad.index')->with('success', 'Localidad eliminado correctamente');
        //   } catch (\Illuminate\Database\QueryException $e) {
        //       //dd($e);
        //       return redirect()->route('localidad.index')->with('error', $e->getMessage());
        //   }

    }
}
