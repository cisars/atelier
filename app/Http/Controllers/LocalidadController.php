<?php

namespace App\Http\Controllers;

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
         dd('lleo');
    }
    public function show(Localidad $localidad)
    {
        //
    }

    public function edit(Localidad $localidad)
    {
        $regiones = Localidad::orderBy('nombre', 'ASC')->get();
        return view('localidad.edit')->with('localidad',$localidad)->with('regiones',$regiones);
    }

    public function update( )
    {

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
