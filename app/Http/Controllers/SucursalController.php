<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sucursal\StoreSucursalRequest;
use App\Http\Requests\Sucursal\UpdateSucursalRequest;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SucursalController extends Controller
{

    public function index()
    {
        $sucursales = Sucursal::all();
        return View::make('sucursal.index')
            ->with('sucursales', $sucursales);
    }
    public function create()
    {
        if($sucursales = Sucursal::orderBy('descripcion', 'ASC')->get())
            return view('sucursal.create')
                ->with('sucursales', $sucursales);
        else
            return view('sucursal.create') ;
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
        return view('sucursal.edit')
            ->with('sucursal',$sucursal) ;
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
