<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
