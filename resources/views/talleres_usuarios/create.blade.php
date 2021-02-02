@extends('adminlte::page')

@section('title', 'Atelier')

@section('css' )

@stop

@section('menu-header')
    <li class="breadcrumb-item active">ABM Taller </li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Taller</h3>
                                </div>

                                    {!! Form::open(  ) !!}


                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col">
                                            <label for="Usuario" >Usuario</label>
                                            <select
                                                class   ="form-control"
                                                name    ="Usuario"
                                                id      ="Usuario">
                                                <option value=" " selected > Seleccione Usuario   </option>
                                            </select>

                                        </div>

                                        <div class="form-group col">
                                            <label for="taller" >Taller</label>
                                            <select
                                                class   ="form-control"
                                                name    ="taller"
                                                id      ="taller">
                                                <option value=" " selected > Seleccione Taller   </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type    ="submit"
                                            class   ="btn btn-info">Grabar</button>
                                        <a href=" " class="btn btn-secondary btn-close">Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')

@endsection
