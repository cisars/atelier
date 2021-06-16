<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sector\StoreSectorRequest;
use App\Http\Requests\Sector\UpdateSectorRequest;
use App\Models\Sector;
use App\Models\Sucursal;
use App\Models\Taller;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
         $sectores = Sector::orderBy('descripcion', 'ASC')->get();
            $sectores = Sector::all();

        return view('sector.index', compact('sectores', $sectores)); // Lista con BelongsTo
    }

    public function create()
    {
        if($sectores = Sector::orderBy('descripcion', 'ASC')->get())
        {
            $talleres = Taller::pluck('descripcion', 'id');
            return view('sector.create')
                ->with('sectores', $sectores)
                ->with('talleres', $talleres);
        } else {
            return view('sector.create') ;
        }
    }

    public function factory()
    {
        factory('App\Models\Sector')->create();
        return redirect()
            ->route('sector.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreSectorRequest $request)
    {
        $sector = new Sector([
            'taller_id' => $request->get('taller'),
            'descripcion' => $request->get('descripcion'),
        ]);
        $sector->save();
        return redirect()
            ->route('sector.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Sector $sector)
    {
        //
    }

    public function edit(Sector $sector)
    {
        $talleres = Taller::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        return view('sector.edit')
            ->with('sector',$sector)
            ->with('talleres',$talleres);
    }

    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        $sector->fill($request->only(['descripcion', 'taller_id']));
        $sector->save();

        return redirect()
            ->route('sector.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        $sector = Sector::findOrFail($request->id);
        $sector->delete();

        return redirect()
            ->route('sector.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }

}
