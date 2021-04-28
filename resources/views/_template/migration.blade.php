{{'<?php'}}

{{--CONFIGURACION--}}
@php
    $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ;
    $NOMBRE   = $gen->tabla['ZNOMBREZ'] ;
    $nombres  = $gen->tabla['ZnombresZ'] ;
    $nombre   = $gen->tabla['ZnombreZ'] ;
// GENISA Begin
@endphp
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Create{{$NOMBRES}}Table extends Migration
{
    public function up()
    {
        Schema::create('{{$nombres}}', function (Blueprint $table) {

@foreach ($gen->tabla['columnas'] as $dataCol)
@php // PK @endphp
@if ($dataCol['cardinalidad'] == 'pk' )
@php
if($dataCol['predeterminado'] == ''){
$predeterminado = 'false';
}else{
$predeterminado = 'true';
}
@endphp
@if ($dataCol['tipo'] == 'int')
            $table->increments('{{$dataCol['nombre']}}') ;
@endif
@if ($dataCol['tipo'] == 'smallint')
            $table->smallInteger('{{$dataCol['nombre']}}',{{$predeterminado}})->unsigned();;
@endif
@if ($dataCol['tipo'] == 'tinyint')
            $table->tinyInteger('{{$dataCol['nombre']}}',{{$predeterminado}})->unsigned();
@endif
@if ($dataCol['tipo'] == 'varchar' || $dataCol['tipo'] == 'char' )
            $table->string('{{$dataCol['nombre']}}', {{$dataCol['longitud']}})->primary();
@endif
@endif
@php // FK @endphp
@if ($dataCol['cardinalidad'] == 'fk')
@if ($dataCol['tipo'] == 'int')
            $table->unsignedInteger('{{$dataCol['nombre']}}')->nullable();
@endif
@if ($dataCol['tipo'] == 'smallint')
            $table->unsignedSmallInteger('{{$dataCol['nombre']}}')->nullable();
@endif
@if ($dataCol['tipo'] == 'tinyint')
            $table->unsignedTinyInteger('{{$dataCol['nombre']}}')->nullable();
@endif
@if ($dataCol['tipo'] == 'varchar' || $dataCol['tipo'] == 'char' )
            $table->string('{{$dataCol['nombre']}}')->nullable();
@endif
@endif
@if ($dataCol['cardinalidad'] == '' || $dataCol['cardinalidad'] == 'cons')
@if ($dataCol['tipo'] == 'int')
            $table->integer('{{$dataCol['nombre']}}')->nullable();
@endif
@if ($dataCol['tipo'] == 'smallint')
            $table->smallInteger('{{$dataCol['nombre']}}')->nullable();
@endif
@if ($dataCol['tipo'] == 'tinyint')
            $table->tinyInteger('{{$dataCol['nombre']}}')->nullable();
@endif
@if ($dataCol['tipo'] == 'numeric')
            $table->float('{{$dataCol['nombre']}}',{{$dataCol['longitud']}})->nullable();
@endif
@if ($dataCol['tipo'] == 'varchar'   )
            $table->string('{{$dataCol['nombre']}}',{{$dataCol['longitud']}})->nullable();
@endif
@if ( $dataCol['tipo'] == 'char' )
            $table->char('{{$dataCol['nombre']}}',{{$dataCol['longitud']}})->nullable();
@endif
@endif
@endforeach

@foreach ($gen->tabla['relaciones'] as $dataRel)
@if($dataRel['eloquent'] == 'belongsTo')
        $table->foreign('{{$dataRel['foreign']}}')
            ->references('{{$dataRel['referencesID']}}')
            ->on('{{$dataRel['onTable']}}')
            ->onDelete('{{$dataRel['onDelete']}}')
            ->onUpdate('{{$dataRel['onUpdate']}}') ;

@endif
@endforeach
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('{{$nombres}}');
    }
}


