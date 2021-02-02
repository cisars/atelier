{{'<?php'}}
{{--CONFIGURACION--}}
// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] {{ $NOMBRES  = $gen->tabla['ZNOMBRESZ']}}
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] {{ $NOMBRE   = $gen->tabla['ZNOMBREZ']}}
// $nombres  = $gen->tabla['ZnombresZ'] {{ $nombres  = $gen->tabla['ZnombresZ']}}
// $nombre   = $gen->tabla['ZnombreZ'] {{ $nombre   = $gen->tabla['ZnombreZ']}}
// GENISA Begin
?>
{{'@'}}extends('adminlte::page')
{{'@'}}section('title', 'Listado de {{ $NOMBRES }}')
{{'@'}}section('css')
{{'@'}}stop

{{'@'}}section('menu-header')
    <li class="breadcrumb-item active">ABM {{ $NOMBRES }} </li>
{{'@'}}stop

{{'@'}}section('content')

{{'@'}}if( !empty(session('msg')))
    {{'@'}}include('adminlte::partials.modals.alerts',['msg'=>session('msg'), 'type'=>session('type') ])
{{'@'}}endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">{{ $NOMBRES }}   </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a  href="{{'{'}}{{'{'}}route('{{ $nombre }}.create'){{'}'}}{{'}'}}" class="btn bg-cyan">Nuevo {{ $NOMBRE }}</a>
                            {{'@'}}if( trim(Auth::user()->perfil) == 'A' && trim(Auth::user()->perfil) != 'D' )
                                <a  href="{{'{'}}{{'{'}}route('{{ $nombre }}.factory')}}" class="btn bg-teal float-right ">Generar Registro dummy</a>
                            {{'@'}}endif
                        </div>

                        <table class="table table-sm table-hover nowrap d-table" id="lista">
                            <thead class="">
                                <tr>
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['visibilidad'] != 'hidden')
                                    <th class="">{{$dataCol['visibilidad']}} </th>
@endif
@endforeach
                                </tr>
                            </thead>
                            <tbody>
                            {{'@'}}foreach(${{ $nombres }} as $key => ${{ $nombre }})
                                <tr class="">
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['visibilidad'] != 'hidden')
                                    <td>{{'{'}}{{'{'}} {{'$'}}{{ $nombre }}->{{ $dataCol['nombre'] }}      {{'}'}}{{'}'}}</td>
@endif
@endforeach
                                    <td class="">
                                        <a
                                            href="{{'{'}}{{'{'}} route('{{ $nombre }}.edit', ${{ $nombre }}->id) {{'}'}}{{'}'}}"
                                            class= "btn btn-info">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button
                                            type        ="button"
                                            class       ="btn btn-danger"
                                            data-toggle ="modal"
                                            data-target ="#modal-danger{{'{'}}{{'{'}} ${{ $nombre }}->id {{'}'}}{{'}'}}"
                                            data-data   ="{{'{'}}{{'{'}} ${{ $nombre }}->id {{'}'}}{{'}'}}">
                                            <i class ="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>

                                        {{'<?php'}}
                                        $confirmation = [
                                            'pk'   => '{{ $nombre }}',
                                            'value' => ${{ $nombre }}->id,
                                            'ruta'  => '{{ $nombre }}.destroy',
                                        ]
                                        {{'?>'}}
                                        {{'@'}}include('adminlte::partials.modals.confirmation',  $confirmation)
                                        {{--                                    <x-alertas :confirmation="$confirmation" ></x-alertas>--}}
                                        {{'</td>'}}
                                    {{'</tr>'}}
                                {{'@'}}endforeach
                            {{'</tbody>'}}
                        {{'</table>'}}
                    <!-- /.card-body -->
                    {{'</div>'}}
                <!-- /.card -->
                {{'</div>'}}
            <!-- /.col -->
            {{'</div>'}}
        {{'</div>'}}
    <!-- /.row -->
    {{'</section>'}}
    <!-- /.content -->

{{'@'}}endsection

{{'@'}}section('js')
    <script>
        // $('#modal-success').modal();
        // $("#modals-alerts").fadeTo(1500, 500).slideUp(500, function(){
        //     $("#modals-alerts").slideUp(500);
        // });
    </script>


{{'@'}}endsection
