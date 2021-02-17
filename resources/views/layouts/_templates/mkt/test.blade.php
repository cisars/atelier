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
                            Controller
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
                            Model
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
                            <a  href="#" class="btn bg-cyan">Enlace</a>
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                            <tr>
                                <th class="w-10">Código </th>
                                <th class="w-10">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                            @dd($reservas)--}}


                                <tr>
                                    <td>{{ $gen->dat }}</td>
                                    <td class=" ">
                                        <a
{{--                                            href="{{ route('reserva.edit', $dat->reserva) }}"--}}
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{$gen->dat}}"
                                            data-data   ="{{$gen->dat}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>



                                    </td>
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
