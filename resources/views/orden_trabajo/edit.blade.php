<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'OrdenesTrabajos')
@section('css')
    @livewireStyles
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar OrdenesTrabajos </li>
@stop
@section('content')

{{--    <div class="row">
        <div class="col-lg-6">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">--}}
                        @livewire('orden-trabajo', ['ordentrabajo' => $orden_trabajo])
{{--                    </div>

                </div>
            </section>

    </div>--}}
@endsection

@section('js')

    @livewireScripts

    <script>
        window.livewire.on('delCambio', (variable) => {

            $('#btn'+variable.id).removeClass();
            $('#icon'+variable.id).removeClass();
            $('#btn'+variable.id).addClass('btn btn-warning');
            $('#icon'+variable.id).addClass('fas fa-plus');

        });
        window.livewire.on('addCambio', (variable) => {

            $('#btn'+variable.id).removeClass();
            $('#icon'+variable.id).removeClass();
            $('#btn'+variable.id).addClass('btn btn-success');
            $('#icon'+variable.id).addClass('fas fa-check');

        });

        window.livewire.on('test', () => {


        });

        $('#lista1').dataTable({
            "autoWidth":false,
            "info":false,
            "JQueryUI":true,
            "ordering":true,
            "paging":false,
            "scrollY":"500px",
            "scrollCollapse":true
        });

        $('#lista2').dataTable({
            "autoWidth":false,
            "info":false,
            "JQueryUI":true,
            "ordering":true,
            "paging":false,
            "scrollY":"500px",
            "scrollCollapse":true
        });
    </script>
@endsection
