@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

{{--                        Usuario--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="usuario"
                                    type="text"
                                    class="form-control
                                    @error('usuario') is-invalid @enderror"
                                    name="usuario"
                                    value="{{ old('usuario') }}" required
                                    autocomplete="usuario"
                                    autofocus>
                                @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        Name--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <input--}}
{{--                                    id="name"--}}
{{--                                    type="text"--}}
{{--                                    class="form-control--}}
{{--                                    @error('name') is-invalid @enderror"--}}
{{--                                    name="name"--}}
{{--                                    value="{{ old('name') }}" required--}}
{{--                                    autocomplete="name"--}}
{{--                                    autofocus>--}}
{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <input--}}
{{--                                    id="email"--}}
{{--                                    type="email"--}}
{{--                                    class="form-control @error('email') is-invalid @enderror"--}}
{{--                                    name="email"--}}
{{--                                    value="{{ old('email') }}" required--}}
{{--                                    autocomplete="email">--}}
{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            <label for="clave" class="col-md-4 col-form-label text-md-right">{{ __('Clave') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="clave"
                                    type="password"
                                    class="form-control @error('clave') is-invalid @enderror"
                                    name="clave" required
                                    autocomplete="new-clave"
                                    >
                                @error('clave')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clave-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Clave') }}</label>

                            <div class="col-md-6">
                                <input id="clave-confirm" type="password" class="form-control" name="clave_confirmation" required autocomplete="new-clave">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
