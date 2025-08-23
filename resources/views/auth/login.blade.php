@extends('layouts.app')

@section('title', 'Inloggen')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center mb-0">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Inloggen
                </h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mailadres</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Wachtwoord</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Onthoud mij
                        </label>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Inloggen
                        </button>
                    </div>
                </form>
                
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        Wachtwoord vergeten?
                    </a>
                </div>
                
                <hr>
                
                <div class="text-center">
                    <p class="mb-0">Nog geen account?</p>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">
                        <i class="fas fa-user-plus me-2"></i>
                        Registreren
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
