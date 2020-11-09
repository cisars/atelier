<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sintoma\StoreSintomaRequest;
use App\Http\Requests\Sintoma\UpdateSintomaRequest;
use App\Models\Sintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SintomaController extends Controller
{


    public function index()
    {
        $sintomas = Sintoma::all();
        return View::make('sintoma.index')
            ->with('sintomas', $sintomas);
    }
    public function create()
    {
        if($sintomas = Sintoma::orderBy('descripcion', 'ASC')->get())
        return view('sintoma.create')
            ->with('sintomas', $sintomas);
        else
            return view('sintoma.create') ;
    }

    public function factory()
    {
        factory('App\Models\Sintoma')->create();
        return redirect()
            ->route('sintoma.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreSintomaRequest $request)
    {

        $sintoma = new Sintoma([
            'descripcion' => $request->get('descripcion')
        ]);
        $sintoma->save();
        return redirect()
            ->route('sintoma.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(Sintoma $sintoma)
    {
        //
    }

    public function edit(Sintoma $sintoma)
    {
        return view('sintoma.edit')
            ->with('sintoma',$sintoma) ;
    }

    public function update(UpdateSintomaRequest $request, Sintoma $sintoma)
    {

        $sintoma->fill($request->all());
        $sintoma->save();

        return redirect()
            ->route('sintoma.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $sintoma = Sintoma::findOrFail($request->sintoma);
        $sintoma->delete();

        return redirect()
            ->route('sintoma.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
