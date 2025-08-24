@extends('layouts.app')

@section('title', 'Inloggen - Mijn Dagboek')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="journal-card">
            <div class="text-center mb-4">
                <i class="fas fa-book-open fa-4x mb-3" style="color: var(--text-accent);"></i>
                <h1 class="h3 mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif; font-style: italic;">
                    Welkom Terug
                </h1>
                <p class="text-muted" style="font-family: 'Georgia', serif;">
                    Log in om je persoonlijke dagboek te openen
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label" style="font-family: 'Playfair Display', serif; color: var(--text-accent);">
                        E-mailadres
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: var(--bg-card); border-color: var(--ink-border);">
                            <i class="fas fa-envelope" style="color: var(--text-accent);"></i>
                        </span>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required autofocus
                               style="border-left: 0;">
                    </div>
                    @error('email')
                        <div class="text-danger mt-1" style="font-family: 'Georgia', serif; font-size: 0.875rem;">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label" style="font-family: 'Playfair Display', serif; color: var(--text-accent);">
                        Wachtwoord
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: var(--bg-card); border-color: var(--ink-border);">
                            <i class="fas fa-lock" style="color: var(--text-accent);"></i>
                        </span>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required
                               style="border-left: 0;">
                    </div>
                    @error('password')
                        <div class="text-danger mt-1" style="font-family: 'Georgia', serif; font-size: 0.875rem;">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember" style="accent-color: var(--primary-color);">
                        <label class="form-check-label" for="remember" style="font-family: 'Georgia', serif; color: var(--text-secondary);">
                            <i class="fas fa-heart me-1" style="color: var(--text-accent);"></i>
                            Onthoud mij
                        </label>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Mijn Dagboek Openen
                    </button>
                </div>
            </form>
            
            <hr class="journal-divider my-4">
            
            <div class="text-center">
                <p class="mb-2" style="font-family: 'Georgia', serif; color: var(--text-secondary);">
                    Nog geen account?
                </p>
                <a href="{{ route('register') }}" class="btn btn-outline-primary me-2" style="font-family: 'Georgia', serif;">
                    <i class="fas fa-user-plus me-1"></i>
                    Registreren
                </a>
                <a href="{{ route('password.request') }}" class="btn btn-outline-secondary" style="font-family: 'Georgia', serif;">
                    <i class="fas fa-key me-1"></i>
                    Wachtwoord vergeten?
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
