<?php

namespace App\Http\Controllers;

use App\Mail\CierreOt;
use App\Mail\ConfirmacionOt;
use App\Mail\EntregaVehiculo;
use App\Mail\EnvioPresupuesto;
use App\Mail\RealizacionOt;
use App\Mail\Registrarse;
use App\Mail\VerificacionOt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BootstrapExampleController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function chartjs()
    {
        return view('vendor/adminlte/pages/charts/chartjs');
    }

    public function flot()
    {
        return view('vendor/adminlte/pages/charts/flot');
    }

    public function inline()
    {
        return view('vendor/adminlte/pages/charts/inline');
    }
    public function data()
    {
        return view('vendor/adminlte/pages/tables/data');
    }


    public function inicio()
    {
        return view('vendor/adminlte/pages/examples/inicio');
    }

    public function enviartodo()
    {
//        Mail::to('cisarcode@gmail.com')->send( new Registrarse());
//        Mail::to('cisarcode@gmail.com')->send( new ConfirmacionOt());
//        Mail::to('cisarcode@gmail.com')->send( new RealizacionOt());
//        Mail::to('cisarcode@gmail.com')->send( new VerificacionOt());
//        Mail::to('cisarcode@gmail.com')->send( new CierreOt());
//        Mail::to('cisarcode@gmail.com')->send( new EntregaVehiculo());
        Mail::to('cisarcode@gmail.com')->send( new EnvioPresupuesto());

        return view('home');

    }


}
