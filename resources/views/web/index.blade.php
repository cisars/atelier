<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Full Width Pics - Start Bootstrap Template</title>

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
            <a class="btn bg-white"
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

  <!-- Header - set the background image for the header in the line below -->
  <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
    <img class="img-fluid d-block mx-auto" src="/img/atelier1.png" alt="">
  </header>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Al alcance de tus manos!  </h1>
      <p class="lead">Con la nueva aplicacion online mantenente informado del progreso de tu vehiculo en tiempo real</p>
      <p class="lead">Empeza hoy mismo a gestionar el mantenimiendo de tu automovil con solo registrarte.</p>
        <a  href="{{route('agendamiento')}}" class="btn bg-danger">Nueva Reserva</a>
    </div>
  </section>

  <!-- Image element - set the background image for the header in the line below -->
  <div class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1081');">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
  </div>


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
