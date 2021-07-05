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
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportacionesController extends Controller
{
    public function stock()
    {
        $arrayValues = ExistenciaManejo::all();
        $encabezado = base64_encode(file_get_contents(public_path('/img/reporte1.jpg')));
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('exports.stock', ['encabezado' => $encabezado], compact('arrayValues'));
        return $pdf->download('stock.pdf');
// Example image is located at `public/images/image.png`



    }

    public function entregas()
    {
        $arrayValues = Entrega::all();
        $encabezado = base64_encode(file_get_contents(public_path('/img/reporte1.jpg')));
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('exports.entregas', ['encabezado' => $encabezado], compact('arrayValues'));
        return $pdf->download('entregas.pdf');
        return Excel::download(new ExportEntregas($entregas), 'entregas.pdf');
    }

    public function reservas()
    {
        $arrayValues = Reserva::all();

        $encabezado = base64_encode(file_get_contents(public_path('/img/reporte1.jpg')));
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('exports.reservas', ['encabezado' => $encabezado], compact('arrayValues'));
        return $pdf->download('reservas.pdf');
        return Excel::download(new ExportReservas($reservas), 'reservas.pdf');
    }

    public function ot()
    {
        $arrayValues = OrdenTrabajo::first();

        $encabezado = base64_encode(file_get_contents(public_path('/img/reporte1.jpg')));
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('exports.ot', ['encabezado' => $encabezado], compact('arrayValues'));
        return $pdf->download('ot.pdf');


//        Excel::create('New file', function($excel) {
//
//            $excel->sheet('New sheet', function($sheet) {
//
//                $sheet->loadView('hello')->with('no_asset', true);
//
//            });
//
//        })->download('pdf');

      //  return Excel::download(new ExportOt($ot), 'ot.pdf');
    }

    public function ots()
    {
        $arrayValues = OrdenTrabajo::all();

        $encabezado = base64_encode(file_get_contents(public_path('/img/reporte1.jpg')));
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('exports.ots', ['encabezado' => $encabezado], compact('arrayValues'));
        return $pdf->download('ots.pdf');
        return Excel::download(new ExportOts($ots), 'ots.pdf');
    }
}
