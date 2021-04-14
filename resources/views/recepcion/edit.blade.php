<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Recepciones
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Recepcion
// $nombres  = $gen->tabla['ZnombresZ'] recepciones
// $nombre   = $gen->tabla['ZnombreZ'] recepcion
//
// ,
// GENISA Begin
?>
@extends('adminlte::page')
@livewireStyles
@section('title', 'Recepciones')
@section('css')

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar Recepciones    </li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @livewire('recepcion', ['talleres' => $talleres])
                    </div>
                </div>
            </section>

        </div>
    </div>
        @endsection

        @section('js')
            @livewireScripts
            <script>
            </script>
@endsection
