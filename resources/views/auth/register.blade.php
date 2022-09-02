
@extends('layouts.escuelas')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="text-center">Registro de usuarios de credencialización</h4>
            <br>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tipo" class="col-md-4 col-form-label text-md-end">Tipo</label>

                    <div class="col-md-6">
                    <select name="tipo"   type="tipo" id="tipo" class="form-control" value="{{ old('tipo') }}" required>
                                    <option>ADMINISTRADOR</option>
                                    <option>CAPTURISTA</option>
                    </select>

                        @error('tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <input id="idescuela" type="hidden" class="form-control @error('idescuela') is-invalid @enderror" name="idescuela" value=0 >
                    @error('idescuela')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input id="idma" type="hidden" class="form-control @error('idescuela') is-invalid @enderror" name="idma" value=0 >

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Correo electrónico</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar contraseña</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
