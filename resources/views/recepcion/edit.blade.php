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
    <li class="breadcrumb-item active"> Editar Recepciones</li>
@stop
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
{{--                        @livewire('recepcion', ['talleres' => $talleres])--}}

                        <livewire:recepcion
                            :talleres="$talleres"
                            :recepcion="$recepcion"
                        />
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
{{--@stack('scripts')--}}
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

            {{--if ( $.fn.dataTable.isDataTable( '#lista' ) ) {--}}
            {{--   var aux = $('#lista').DataTable();--}}

            {{--    $('#lista').DataTable({--}}
            {{--        "destroy": true--}}
            {{--    });--}}
            {{--    aux.DataTable( {--}}
            {{--        "language": {--}}
            {{--            "url": "{{ asset('js/dataTableSpanish.json') }}"--}}
            {{--        },--}}
            {{--        "paging": true,--}}
            {{--        "lengthChange": true,--}}
            {{--        "searching": true,--}}
            {{--        "ordering": true,--}}
            {{--        "info": true,--}}
            {{--        "autoWidth": false,--}}
            {{--        "responsive": true,--}}
            {{--        "scrollX": true,--}}
            {{--        retrieve: true--}}
            {{--    } );--}}
            {{--}--}}
            {{--else {--}}
            {{--      $('#lista').DataTable( {--}}
            {{--              "language": {--}}
            {{--                      "url": "{{ asset('js/dataTableSpanish.json') }}"--}}
            {{--                  },--}}
            {{--                  "paging": true,--}}
            {{--                  "lengthChange": true,--}}
            {{--                  "searching": true,--}}
            {{--                  "ordering": true,--}}
            {{--                  "info": true,--}}
            {{--                  "autoWidth": false,--}}
            {{--                  "responsive": true,--}}
            {{--                  "scrollX": true,--}}
            {{--        retrieve: true--}}
            {{--    } );--}}
            {{--}--}}



           if ( $.fn.DataTable.isDataTable('#lista') ) {
               $('#lista').DataTable().destroy();
           }

           $('#lista').dataTable({
               "autoWidth":false,
               "info":false,
               "JQueryUI":true,
               "ordering":true,
               "paging":false,
               "scrollY":"500px",
               "scrollCollapse":true
           });





            {{--$('#lista').DataTable({--}}
            {{--    "language": {--}}
            {{--        "url": "{{ asset('js/dataTableSpanish.json') }}"--}}
            {{--    },--}}
            {{--    "paging": true,--}}
            {{--    "lengthChange": true,--}}
            {{--    "searching": true,--}}
            {{--    "ordering": true,--}}
            {{--    "info": true,--}}
            {{--    "autoWidth": false,--}}
            {{--    "responsive": true,--}}
            {{--    "scrollX": true,--}}
            {{--});--}}
        });
    </script>
@endsection


