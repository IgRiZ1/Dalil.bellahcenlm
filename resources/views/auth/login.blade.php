@extends('layouts.app')

@section('title', 'Inloggen')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="modern-card">
            <div class="modern-card-header text-center">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle p-4 mb-3">
                    <i class="fas fa-sign-in-alt fa-2x" style="color: var(--primary-color);"></i>
                </div>
                <h3 class="mb-0" style="color: var(--primary-color); font-weight: 600;">Welkom Terug</h3>
                <p class="text-muted mb-0">Log in bij uw account</p>
            </div>
            <div class="modern-card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="modern-form-label">
                            <i class="fas fa-envelope me-2"></i>
                            E-mailadres
                        </label>
                        <input type="email" class="modern-form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" 
                               placeholder="Voer uw e-mailadres in" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="modern-form-label">
                            <i class="fas fa-lock me-2"></i>
                            Wachtwoord
                        </label>
                        <input type="password" class="modern-form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" 
                               placeholder="Voer uw wachtwoord in" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember" style="color: var(--text-secondary);">
                                <i class="fas fa-remember me-2"></i>
                                Onthoud mij
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn-modern-primary w-100" style="padding: 1rem;">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Inloggen
                        </button>
                    </div>
                </form>
                
                <div class="text-center mb-4">
                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--primary-color);">
                        <i class="fas fa-question-circle me-1"></i>
                        Wachtwoord vergeten?
                    </a>
                </div>
                
                <div class="border-top pt-4 text-center">
                    <p class="text-muted mb-3">Nog geen account?</p>
                    <a href="{{ route('register') }}" class="btn-modern-secondary">
                        <i class="fas fa-user-plus"></i>
                        Account Aanmaken
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
