@extends('layouts.app')

@section('content')
<div class="centered-content">
    <div class="container">
        <style>
            nav.navbar{display: none !important;}
            .centered-content{display:flex;align-items:center;justify-content:center;height:100vh;}
        </style>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="text-center"><img src="/color_logo_small.png" width="100"></p>
                <h2 class="text-center">CREDENCIALIZACIÓN</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
    
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">Usuario</label>
    
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
    
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

               
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
    
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                  
    
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    Mantener sesión abierta
                                </label>
                            </div>
                        </div>
                    </div>
    
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Iniciar sesión
                            </button>
    
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
