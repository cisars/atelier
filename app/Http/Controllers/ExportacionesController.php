<?php

namespace App\Http\Controllers;

use App\Exports\ExportEntregas;
use App\Exports\ExportOt;
use App\Exports\ExportOts;
use App\Exports\ExportReservas;
use App\Exports\ExportStock;
use App\Http\Livewire\Entregas;
use App\Models\Entrega;
use App\Models\ExistenciaManejo;
use App\Models\OrdenTrabajo;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportacionesController extends Controller
{
    public function stock()
    {
        $existencias = ExistenciaManejo::all();

        return Excel::download(new ExportStock($existencias), 'stock.pdf');
    }

    public function entregas()
    {
        $entregas = Entrega::all();

        return Excel::download(new ExportEntregas($entregas), 'entregas.pdf');
    }

    public function reservas()
    {
        $reservas = Reserva::all();

        return Excel::download(new ExportReservas($reservas), 'reservas.pdf');
    }

    public function ot()
    {
        $ot = OrdenTrabajo::first();

        return Excel::download(new ExportOt($ot), 'ot.pdf');
    }

    public function ots()
    {
        $ots = OrdenTrabajo::all();

        return Excel::download(new ExportOts($ots), 'ots.pdf');
    }
}
