<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] ProductosServicios
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] ProductoServicio
// $nombres  = $gen->tabla['ZnombresZ'] productos_servicios
// $nombre   = $gen->tabla['ZnombreZ'] producto_servicio
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@section('title', 'Entrega Vehículo')
@section('css')
    @livewireStyles
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/Reservas "> Entrega Vehículo</a></li>
    <li class="breadcrumb-item active"> ABM Entrega Vehículo</li>
@stop
@section('content')
    @livewire('entregas')
@endsection

@section('js')
    @livewireScripts
    <script>
    </script>
    @stack('pushed_scripts')
@endsection
