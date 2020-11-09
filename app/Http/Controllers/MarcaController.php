<?php

namespace App\Http\Controllers;

use App\Http\Requests\Marca\StoreMarcaRequest;
use App\Http\Requests\Marca\UpdateMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MarcaController extends Controller
{


    public function index()
    {
        $marcas = Marca::all();
        return View::make('marca.index')
            ->with('marcas', $marcas);
    }
    public function create()
    {
        if($marcas = Marca::orderBy('descripcion', 'ASC')->get())
        return view('marca.create')
            ->with('marcas', $marcas);
        else
            return view('marca.create') ;
    }

    public function factory()
    {
        factory('App\Models\Marca')->create();
        return redirect()
            ->route('marca.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreMarcaRequest $request)
    {

        $marca = new Marca([
            'descripcion' => $request->get('descripcion')
        ]);
        $marca->save();
        return redirect()
            ->route('marca.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(Marca $marca)
    {
        //
    }

    public function edit(Marca $marca)
    {
        return view('marca.edit')
            ->with('marca',$marca) ;
    }

    public function update(UpdateMarcaRequest $request, Marca $marca)
    {

        $marca->fill($request->all());
        $marca->save();

        return redirect()
            ->route('marca.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $marca = Marca::findOrFail($request->marca);
        $marca->delete();

        return redirect()
            ->route('marca.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
