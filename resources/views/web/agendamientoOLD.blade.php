<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Atelier</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('web/css/full-width-pics.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
{{--    https://github.com/drien/jquery-flipster--}}
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        @if( Auth::user())
            <a class="btn btn-default"
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"></i>
                Cerrar sesión
            </a>
            <form id="logout-form" action="{{ 'logout' }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @else
            <a class="navbar-brand" href="login">Iniciar Sesion</a>
        @endif


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agendamiento">Reservas</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <!-- Content section -->
  <section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                                <div class="card card-maroon">
                                    <div class="card-header">
                                        <h3 class="card-title">Calendario de Atenciones</h3>
                                    </div>


                                    <div class="card-body">

                                        {!! Form::open() !!}

                                        {{--<div class="form-row">--}}

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label> Calendario disponible hasta 15 dias en adelante. </label>
                                                <input class="form-control"
                                                       type="date"
                                                       placeholder=" "
                                                       value="29/01/2021">
                                            </div>
                                        </div>



                                        {{--                                    nowrap d-table--}}
                                        <table class="table table-sm table-hover " >
                                            <thead class="">
                                            <tr>
                                                <th >Hora </th>
                                                <th class="">07:30 </th>
                                                <th class="">07:45 </th>
                                                <th class="">08:00 </th>
                                                <th class="">08:15 </th>
                                                <th class="">08:30 </th>
                                                <th class="">08:45 </th>
                                                <th class="">09:00 </th>
                                                <th class="">09:15 </th>
                                                <th class="">09:30 </th>
                                                <th class="">09:45 </th>
                                                <th class="">13:00 </th>
                                                <th class="">13:15 </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 1
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 2
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 3
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 4
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 5
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 6
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 7
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 8
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 9
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 10
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-danger">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Ocupado
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td class="cuadrado" >
                                                    <div class="container h-100">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group"> 2
                                                                    {{--                                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cuadrado" >
                                                    <div class="container h-100 btn btn-success">
                                                        <div class="row h-100 justify-content-center align-items-center">
                                                            <form class="col-12">
                                                                <div class="form-group ">
                                                                    Libre
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                        <div class="card-footer  ">

                                            <a href="reservaenlinea" class="btn btn-info">Nuevo Agendamiento</a>
                                            <a href="" class="btn btn-secondary btn-close">Cancelar</a>
                                        </div>

                                        {!! Form::close() !!}
                                    </div>


                                </div>

            </div>
        </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">© 2021 Atelier. All rights reserved.</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/web/vendor/jquery/jquery.min.js"></script>
  <script src="/web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
