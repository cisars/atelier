<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Entradas')
@section('css')
    @livewireStyles
@stop

@section('menu-header')
<li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
<li class="breadcrumb-item active"> Editar Entradas </li>
@stop
@section('content')
    @livewire('stock-entrada', ['entrada' => $entrada])
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
