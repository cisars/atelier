<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sector\StoreSectorRequest;
use App\Http\Requests\Sector\UpdateSectorRequest;
use App\Models\Sector;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        if($sectores = Sector::orderBy('descripcion', 'ASC')->get()){
            $sectores = Sector::all();

            $sectores->each(function($sector)
            {
                $sector->sucursal = Sucursal::find($sector->sucursal);
            });
        }
        return view('sector.index', compact('sectores', $sectores)); // Lista con BelongsTo
    }

    public function create()
    {
        if($sectores = Sector::orderBy('descripcion', 'ASC')->get())
        {
            $sucursales = Sucursal::all();
            return view('sector.create')
                ->with('sectores', $sectores)
                ->with('sucursales', $sucursales);
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
            'sucursal' => $request->get('sucursal'),
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
        $sucursales = Sucursal::orderBy('descripcion', 'ASC')->get();
        return view('sector.edit')
            ->with('sector',$sector)
            ->with('sucursales',$sucursales);
    }

    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        $sector->fill($request->all());
        $sector->save();

        return redirect()
            ->route('sector.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        $sector = Sector::findOrFail($request->sector);
        $sector->delete();

        return redirect()
            ->route('sector.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }

}
