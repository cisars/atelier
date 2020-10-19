@extends('adminlte::page')

@section('title', 'Atelier')

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('Tablero de controles') }}</h1>
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

                    {{ __('You are logged in!') }}

                        {{ Auth::user()  }}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class= "col-md-12">
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <table id="example" class="table table-striped table-sm  " style="width: 100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>ZIP / Post code</th>
                            <th>Country</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>123456</td>
                            <td>Cliente1</td>
                            <td>Numero</td>
                            <td>111111</td>
                            <td>EEUU</td>
                        </tr>
                        <tr>
                            <td>444556</td>
                            <td>Cliente2</td>
                            <td>Numero2</td>
                            <td>222222</td>
                            <td>EEUU</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>


        </div>
    </div>

@stop
{{--        @endsection--}}
