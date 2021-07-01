@extends('adminlte::page')

@section('title', 'Editar Vehículo')
@livewireStyles
@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item"><a href="/{{  Request::segment(1) }} "> {{ Request::segment(1) }}</a></li>
    <li class="breadcrumb-item active"> Editar </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <livewire:vehiculo
                        :vehiculos="$vehiculos"
                        :vehiculo="$vehiculo"
                        :clientes="$clientes"
                        :modelos="$modelos"
                        :colores="$colores"
                        :combustiones="$combustiones"
                        :tipos="$tipos"
                    />

                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    @livewireScripts

    @stack('pushed_scripts')
@endsection

