@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
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

@section('adminlte_js')
    @stack('js')
    @yield('js')
{{--    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}

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
