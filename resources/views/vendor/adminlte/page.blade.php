@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
{{--    codigo2--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css"--}}
{{--          integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g=="--}}
{{--          crossorigin="anonymous" />--}}


{{--    funciona-- codigo 1}}
{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />--}}

    <style>
        .required:after{
            content:'*';
            color:red;
            padding-left:2px;
        }
    </style>
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')


                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1 class="m-0 text-dark">@yield('title')</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                                                @yield('menu-header')
                                                {{--  <li class="breadcrumb-item active">@yield('title')</li>
                                                <li class="breadcrumb-item active">@yield('item')</li>  --}}
                                            </ol>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->











                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop
{{--@section('modals' )--}}
{{--    @include('adminlte::partials.modals.modals')--}}
{{--@stop--}}
@section('adminlte_js')
    @stack('js')
    @yield('js')

 <script src="{{ asset('js/scriptModals.js') }}" defer></script>







{{--        funciona-- codigo1}}
{{--  este no es necesario          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
{{--            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>--}}
{{--            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"--}}







{{--codigo2--}}
{{--            <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script>--}}









    {{--    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}

    @if(Route::current()->getName() == 'flot')
{{--        <script src="{{ asset('plugins/chart.js/plot.js') }}" defer></script>--}}
{{--        <script src="{{ asset('js/scriptFlot.js') }}" defer></script>--}}
    @endif
    @if(Route::current()->getName() == 'chartjs')
{{--        <script src="{{ asset('js/scriptChart.js') }}" defer></script>--}}
    @endif
    @if(Route::current()->getName() == 'inline')
{{--        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}" defer></script>--}}
{{--        <script src="{{ asset('plugins/sparkline/sparkline.js') }}" defer></script>--}}
{{--        <script src="{{ asset('js/scriptInline.js') }}" defer></script>--}}
    @endif

    @if (Route::current()->getName() == 'data')
{{--        <script src="{{ asset('js/scriptData.js') }}" defer></script>--}}
    @endif
@stop
