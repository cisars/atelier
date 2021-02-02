<?php

namespace App\Http\Controllers;

use App\Http\Requests\Maquinaria\StoreMaquinariaRequest;
use App\Http\Requests\Maquinaria\UpdateMaquinariaRequest;
use App\Models\Maquinaria;
use App\Models\MaquinariaTipo;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index()
    {
        $maquinarias = Maquinaria::all();

        $maquinarias->each(function ($maquinaria) {

            //Recorre y carga cada estado
            foreach ((new Maquinaria())->getEstados() as $clave=>$valor)
                trim($maquinaria->estado) == trim($valor) ? $maquinaria->estado = $clave : NULL ;

        });
        return view('maquinaria.index', compact('maquinarias', $maquinarias)); // Lista con BelongsTo
    }

    public function create()
    {
        $maquinaria     = new Maquinaria();
        $estados        = $maquinaria->getEstados();

        $maquinarias = Maquinaria::orderBy('descripcion', 'ASC')->get();
        $maquinarias_tipos = MaquinariaTipo::all();
        return view('maquinaria.create')
            ->with('maquinarias', $maquinarias)
            ->with('estados', $estados)
            ->with('maquinarias_tipos', $maquinarias_tipos);

    }

    public function factory()
    {
        factory('App\Models\Maquinaria')->create();
        return redirect()
            ->route('maquinaria.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreMaquinariaRequest $request)
    {
        $maquinaria = new Maquinaria([
            'descripcion'       => $request->get('descripcion'),
            'estado'            => $request->get('estado'),
            'maquinaria_tipo'   => $request->get('maquinaria_tipo'),
        ]);
        $maquinaria->save();
        return redirect()
            ->route('maquinaria.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Maquinaria $maquinaria)
    {
        dd($maquinaria);
    }

    public function edit(Maquinaria $maquinaria)
    {
     //   dd($maquinarium);
       // $maquinaria  = Maquinaria::find($maquinaria->maquinaria);
        $maquinarias_tipos = MaquinariaTipo::orderBy('descripcion', 'ASC')->get();
       // $estados = (new Maquinaria)->getEstados();
        $estados = $maquinaria->getEstados();
        return view('maquinaria.edit')
            ->with('maquinaria',$maquinaria)
            ->with('estados',$estados)
            ->with('maquinarias_tipos',$maquinarias_tipos);
    }

    public function update(UpdateMaquinariaRequest $request, Maquinaria $maquinaria)
    {
    // dd($maquinarium);l
        $maquinaria->fill($request->all());
        $maquinaria->save();

        return redirect()
            ->route('maquinaria.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {

        $maquinaria = Maquinaria::findOrFail($request->maquinaria);
        $maquinaria->delete();

        return redirect()
            ->route('maquinaria.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }

}
