<?php
namespace App\Exports;

use App\Models\ExistenciaManejo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStock implements FromView
{
    public $arrayValues;
    public function __construct($arrayValues)
    {
        $this->arrayValues = $arrayValues;
    }

    public function view(): View
    {
        $arrayValues = $this->arrayValues;
        return view('exports.stock', compact('arrayValues'));
    }
}
