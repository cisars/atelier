<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Atelier</title>

  <!-- Bootstrap core CSS -->
  <link href="/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/web/css/full-width-pics.css" rel="stylesheet">

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
            <div class="col-lg-10">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Registrarse y continuar </h3>
                    </div>


                    <div class="card-body">

                        {!! Form::open() !!}

                        {{--<div class="form-row">--}}

                        <div class="form-row">
                            <div class="form-group col">
                                <label> Introduzca su Documento </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="Documento " value="">
                            </div>
                            <div class="form-group col">
                                <label> Nombre </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="Nombre " value="">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label> Correo </label>
                            <input class="form-control"
                                   type="text"
                                   placeholder="Email " value="">
                        </div>

                        <div class="card-footer  ">
                            <button
                                type="submit"
                                class="btn btn-info">Enviar
                            </button>
                            <a href="" class="btn btn-secondary btn-close">Cancelar</a>
                        </div>

                        {!! Form::close() !!}
                    </div>


                </div>
<br>
<br>
<br>
<br>
                <div class="card card-cyan " style="background-color: #EEEEEE">
                    <div class="card-header ">
                        <h3 class="card-title">Datos del Vehiculo</h3>
                    </div>


                    <div class="card-body">

                        {!! Form::open() !!}

                        {{--<div class="form-row">--}}

                        <div class="form-row">
                            <div class="form-group col">
                                <label> Seleccione o cree su vehiculo </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="vehiculo " value="">
                            </div>
                            <div class="form-group col">
                                <label> Marca </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="Marca " value="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label> Modelo </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="Modelo " value="">
                            </div>
                            <div class="form-group col">
                                <label> Placa </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="Placa " value="">
                            </div>
                            <div class="form-group col">
                                <label> Año </label>
                                <input class="form-control"
                                       type="text"
                                       placeholder="Año " value="">
                            </div>
                        </div>


                        <div class="card-footer  ">
                            <button
                                type="submit"
                                class="btn btn-info">Grabar
                            </button>
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
