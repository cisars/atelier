@extends('adminlte::page')

@section('title', 'GEN')

@section('css' )
    <style>
        .CodeMirror {
            border: 1px solid #eee;
            height: auto;
            font-size: 12px
        }
    </style>
@stop

@section('menu-header')
    <li class="breadcrumb-item active">GEN </li>
@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">

            {{-- Controller|CodeMirror--}}
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{$gen->tabla['ZNOMBREZ']}}Controller.php
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12">
                        <textarea
                            id="Controller|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small">@include('_template.controller',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Controller|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Model|CodeMirror--}}
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Models/{{$gen->tabla['ZNOMBREZ']}}.php
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12">
                        <textarea
                            id="Model|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small">@include('_template.model',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Model|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Index|CodeMirror--}}
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Index/{{$gen->tabla['ZNOMBREZ']}}.php (View)
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12">
                        <textarea
                            id="Index|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small">@include('_template.index',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Index|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Edit|CodeMirror--}}
            <div class="col-md-12 " >
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit/{{$gen->tabla['ZNOMBREZ']}}.php (View)
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12" >
                        <textarea
                            id="Edit|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small"
                        >@include('_template.edit',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Edit|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>


            {{-- Fake|CodeMirror--}}
            <div class="col-md-12 " >
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Fake/{{$gen->tabla['ZNOMBREZ']}}.php (Fake)
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12" >
                        <textarea
                            id="Fake|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small"
                        >@include('_template.fake',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Fake|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            (Request)
            {{-- Store|CodeMirror--}}
            <div class="col-md-12 " >
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Store/{{$gen->tabla['ZNOMBREZ']}}.php (Request)
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12" >
                        <textarea
                            id="Store|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small"
                        >@include('_template.store',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Store|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            {{-- Update|CodeMirror--}}
            <div class="col-md-12 " >
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Update/{{$gen->tabla['ZNOMBREZ']}}.php (Request)
                        </h3>
                    </div>
                    <div class="card-body border-primary col-md-12" >
                        <textarea
                            id="Update|CodeMirror"
                            class="col-md-12"
                            style="font-size: x-small"
                        >@include('_template.update',['gen'=>$gen])</textarea>
                        <button
                            type        ="button"
                            class       ="btn btn-success pull-right"
                            onclick     ="copyText('Update|CodeMirror');" > Copiar
                            <i class ="fas fa-clipboard" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <!--   .col-->

        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">GEN   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">

                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th > </th>
                                <th > </th>
                            </tr>
                            </thead>Agregar rutas
                            <tbody>
                            {{--                            @dd($reservas)--}}


                            <tr>
                                <td>{{ $gen->dat }}</td>
                            </tr>
                            <tr>
                                <td>En View/Vendor/adminlte/page.blade.php</td>

                                <td>Route::current()->getName() == 'nuevogen'</td>
                            </tr>
                            <tr>
                                <td>En web.php</td>

                                <td>Route::get('/nuevogen', 'NuevoGen@index')->name('nuevogen');</td>
                            </tr>
                            <tr>
                                <td>En adminlte.config.php</td>

                            </tr>

                            </tbody>
                        </table>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection

@section('js')
    <script>

        $(function () {
            //  https://codemirror.net/demo/theme.html#dracula
            // Controller|CodeMirror
            CodeMirror.fromTextArea(document.getElementById("Controller|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true
            })
            //.indentLine('smart')
            //.indentAutoShift
            //.setSize('100%','100%')
            ;
            CodeMirror.fromTextArea(document.getElementById("Model|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true
            });

            CodeMirror.fromTextArea(document.getElementById("Index|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true
            });

            CodeMirror.fromTextArea(document.getElementById("Edit|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true,

            }).setSize( 1200, 700 );

            CodeMirror.fromTextArea(document.getElementById("Fake|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true,

            }).setSize( 1200, 700 );

            CodeMirror.fromTextArea(document.getElementById("Store|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true,

            }).setSize( 1200, 700 );

            CodeMirror.fromTextArea(document.getElementById("Update|CodeMirror"),{
                theme: "material",
                readOnly: true,
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                smartIndent:true,

            }).setSize( 1200, 700 );
        });

        function copyText( objetoid ){
            /* Get the text field */
            var copyText = document.getElementById(objetoid);
            copyText.select();
            // copyText.setSelectionRange(0, 99999999);
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);

        }
    </script>


@endsection
