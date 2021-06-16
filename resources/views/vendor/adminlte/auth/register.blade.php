@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input
                type="text"
                name="usuario"
                class="form-control {{ $errors->has('usuario') ? 'is-invalid' : '' }}"
                value="{{ old('usuario') }}" placeholder="{{ __('adminlte::adminlte.usuario') }}"
                autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('usuario'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('usuario') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input
                type="email"
                name="email"
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                value="{{ old('email') }}"
                placeholder="{{ __('adminlte::adminlte.email') }}"
            >
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input
                type="text"
                name="razon_social"
                class="form-control {{ $errors->has('razon_social') ? 'is-invalid' : '' }}"
                value="{{ old('razon_social') }}"
                placeholder="Nombre y Apellido"
            >
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('razon_social'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('razon_social') }}</strong>
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            <input
                type="text"
                maxlength="12"
                name="documento"
                class="form-control {{ $errors->has('documento') ? 'is-invalid' : '' }}"
                value="{{ old('documento') }}"
                placeholder="Nro. Documento"
            >
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('documento'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('documento') }}</strong>
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            {!! Form::select('localidad_id', \App\Models\Localidad::pluck('descripcion', 'id') , null , ['class' => 'form-control '.($errors->has('localidad_id') ? 'is-invalid' : ''), 'placeholder' => 'Selecciona la localidad']) !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-location-arrow {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('localidad_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('localidad_id') }}</strong>
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            {!! Form::text('movil', null, ['class' => 'form-control '.($errors->has('movil') ? 'is-invalid' : ''), 'maxlenght' => '20', 'placeholder' => 'Móvil']) !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('movil'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('movil') }}</strong>
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control '.($errors->has('fecha_nacimiento') ? 'is-invalid' : '')]) !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('fecha_nacimiento'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            {!! Form::select('personeria', array_flip((new \App\Models\Cliente())->getPersonerias()) , null , ['class' => 'form-control '.($errors->has('personeria') ? 'is-invalid' : '')]) !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('personeria'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('personeria') }}</strong>
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            {!! Form::select('taller_id', \App\Models\Taller::pluck('descripcion', 'id') , null , ['class' => 'form-control '.($errors->has('taller_id') ? 'is-invalid' : ''), 'placeholder' => 'Selecciona el taller']) !!}
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('taller_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('taller_id') }}</strong>
                </div>
            @endif
        </div>


        {{-- Password field --}}
        <div class="input-group mb-3">
            <input
                type="password"
                name="clave"
                class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}"
                placeholder="{{ __('adminlte::adminlte.clave') }}"
            >
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('clave'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('clave') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input
                type="password"
                name="clave_confirmation"
                class="form-control {{ $errors->has('clave_confirmation') ? 'is-invalid' : '' }}"
                placeholder="{{ __('adminlte::adminlte.retype_clave') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('clave_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('clave_confirmation') }}</strong>
                </div>
            @endif
        </div>

        {{-- Register button --}}
        <button
            type="submit"
            class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}"
        >
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
