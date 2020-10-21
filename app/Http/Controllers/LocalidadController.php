<?php

namespace App\Http\Controllers;

use App\Http\Requests\Localidad\StoreLocalidadRequest;
use App\Http\Requests\Localidad\UpdateLocalidadRequest;
use App\Models\Localidad;
use Illuminate\Http\Request;


class LocalidadController extends Controller
{

    public function index()
    {
        $localidades = Localidad::all();
        return view('localidad.index', compact('localidades', $localidades));
    }
    public function create()
    {
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        return view('localidad.create')
            ->with('localidades', $localidades);

    }
    public function store(StoreLocalidadRequest $request)
    {
        $distrito = new Localidad($request->all());
        $distrito->save();
        return redirect('/localidad');
   //     return redirect('/localidad')->with('success', 'Distrito grabado correctamente');
    }

    public function show(Localidad $localidad)
    {
        //
    }

    public function edit(Localidad $localidad)
    {
//        $regiones = Localidad::orderBy('descripcion', 'ASC')->get();
//        return view('localidad.edit')->with('localidad',$localidad)->with('regiones',$regiones);
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        return view('localidad.edit')->with('localidad',$localidad)->with('localidades',$localidades);
    }

    public function update(UpdateLocalidadRequest $request, Localidad $localidad)
    {

        $localidad->fill($request->all());
        $localidad->save();
        return redirect( '/localidad');
//        return redirect(route('localidad.index'))->with('success', 'Localidad actualizada correctamente');
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
