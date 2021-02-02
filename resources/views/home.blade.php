@extends('adminlte::page')

@section('title', 'Home')

@section('css' )

@stop

@section('menu-header')
{{--   --   --}}
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   {{ __('Sesion iniciada!') }} <br>
                        <h1> {{ __('Bienvenido,')  }} usuario <b>{{ Auth::user()->usuario  }}</b> </h1>
{{--<br> Mis datos <a  href="{{route('listausuarios')}}" class="btn bg-cyan">Lista Usuarios</a>--}}
                        <br>
{{--                        {{ Auth::user()  }}--}}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class= "col-md-12">
            <div class="card card-cyan">
                <h5 class="card-header">Panel principal</h5>

            </div>


        </div>

        <div class= "col-md-12">
            <div class="card card-cyan">
                <h5 class="card-header">Empleados</h5>
                <div class="card-body">
                    <div class="card-title">Descripcion / Lista de empleados</div>

                </div>
            </div>


        </div>
    </div>

@stop
{{--        @endsection--}}
