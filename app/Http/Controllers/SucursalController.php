<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sucursal\StoreSucursalRequest;
use App\Http\Requests\Sucursal\UpdateSucursalRequest;
use App\Models\Localidad;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{

    public function index()
    {
        if($sucursales = Sucursal::orderBy('descripcion', 'ASC')->get()){
        $sucursales = Sucursal::all();

            $sucursales->each(function($sucursal)
            {
                $sucursal->localidad = Localidad::find($sucursal->localidad);
            });
        }
        return view('sucursal.index', compact('sucursales', $sucursales)); // Lista con BelongsTo
    }
    public function create()
    {
        if($sucursales = Sucursal::orderBy('descripcion', 'ASC')->get())
        {
            $localidades = Localidad::all();
            return view('sucursal.create')
                ->with('sucursales', $sucursales)
                ->with('localidades', $localidades);
        } else {
            return view('sucursal.create') ;
        }
    }

    public function factory()
    {
        factory('App\Models\Sucursal')->create();
        return redirect()
            ->route('sucursal.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreSucursalRequest $request)
    {
        $sucursal = new Sucursal([
            'descripcion' => $request->get('descripcion'),
            'localidad' => $request->get('localidad'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'email' => $request->get('email'),
        ]);
        $sucursal->save();
        return redirect()
            ->route('sucursal.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Sucursal $sucursal)
    {
        //
    }

    public function edit(Sucursal $sucursal)
    {
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        return view('sucursal.edit')
            ->with('sucursal',$sucursal)
            ->with('localidades',$localidades);

//        return view('sucursal.edit')
//            ->with('sucursal',$sucursal) ;
    }

    public function update(UpdateSucursalRequest $request, Sucursal $sucursal)
    {

        $sucursal->fill($request->all());
        $sucursal->save();

        return redirect()
            ->route('sucursal.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        // try {
        $sucursal = Sucursal::findOrFail($request->sucursal);
        $sucursal->delete();

        return redirect()
            ->route('sucursal.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
        //   } catch (\Illuminate\Database\QueryException $e) {
        //       //dd($e);
        //       return redirect()->route('sucursal.index')->with('error', $e->getMessage());
        //   }

    }
}
