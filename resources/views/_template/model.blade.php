{{'<?php'}}

{{--CONFIGURACION--}}
// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] {{ $NOMBRES  = $gen->tabla['ZNOMBRESZ']}}
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] {{ $NOMBRE   = $gen->tabla['ZNOMBREZ']}}
// $nombres  = $gen->tabla['ZnombresZ'] {{ $nombres  = $gen->tabla['ZnombresZ']}}
// $nombre   = $gen->tabla['ZnombreZ'] {{ $nombre   = $gen->tabla['ZnombreZ']}}
// GENISA Begin

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {{$NOMBRE}} extends Model
{
    protected $table = '{{$nombres}}';
    //protected $primaryKey = 'empleado';
    //protected $fillable = [];
    protected $guarded = [];

// Create all cons var with data {{$aux = null}}
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux != $dataCons['nombres'])
    // {{ ucfirst($dataCons['nombre']) }}
@endif
    const {{ $dataCons['clave'] }} = '{{ $dataCons['valor'] }}'; // {{$aux = $dataCons['nombres']}}
@endforeach

// Create all cons FUNCTIONS {{$aux = null}}
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux != $dataCons['nombres'])
    // Funcion {{ ucfirst($dataCons['nombre']) }} // {{ $aux = $dataCons['nombres'] }}
    public function get{{ ucfirst($dataCons['nombres']) }}()
    {
        return ${{$dataCons['nombres']}} = [
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux == $dataCons['nombres'])
        '{{$dataCons['descripcion']}}' => {{$NOMBRE}}::{{$dataCons['clave']}},
@endif
@endforeach
        ];
    }
@endif
@endforeach

@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk')
    public function {{$dataCol['fk']}}()
    {
        return $this->belongsTo({{$dataCol['FK']}}::class, '{{$dataCol['fk']}}_id');
    }
@endif
@endforeach

@foreach ($gen->tabla['relaciones'] as $dataRel)
@if('hasMany' == $dataRel['eloquent'])
    public function {{$dataRel['funcion']}}()
    {
        return $this->hasMany({{$dataRel['related']}}, '{{$nombre}}_id');
    }
@endif
@endforeach

}

{{'?>'}}
