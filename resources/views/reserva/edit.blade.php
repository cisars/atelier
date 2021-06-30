<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Reservas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Reserva
// $nombres  = $gen->tabla['ZnombresZ'] reservas
// $nombre   = $gen->tabla['ZnombreZ'] reserva
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')

@section('title', 'Reservas')
@livewireStyles
@section('css')
@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar Reserva </li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">


                    <livewire:reserva
                        :talleres="$talleres"
                        :clientes="$clientes"
                        :vehiculos="$vehiculos"
                        :reserva="$reserva"
                        :empleados="$empleados"
                        :usuarios="$usuarios"
                        :formas="$formas"
                        :estados="$estados"
                        :prioridades="$prioridades"
                    />

{{--                    @livewire('reserva',   ['talleres' => $talleres ])--}}

                </div>
            </section>

        </div>
        @endsection

        @section('js')
            @livewireScripts

            <script>
            </script>
    @stack('pushed_scripts')
@endsection
