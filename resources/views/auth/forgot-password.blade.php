@extends('layouts.app')

@section('title', 'Wachtwoord Vergeten - Mijn Dagboek')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="journal-card">
            <div class="text-center mb-4">
                <i class="fas fa-key fa-4x mb-3" style="color: var(--text-accent);"></i>
                <h1 class="h3 mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif; font-style: italic;">
                    Wachtwoord Vergeten?
                </h1>
                <p class="text-muted" style="font-family: 'Georgia', serif;">
                    Geen zorgen, we helpen je weer toegang te krijgen tot je dagboek
                </p>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                <div class="mb-4">
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
                               style="border-left: 0;"
                               placeholder="Voer je e-mailadres in">
                    </div>
                    <div class="form-text" style="font-family: 'Georgia', serif; font-size: 0.875rem; color: var(--text-muted);">
                        We sturen een herstellink naar dit adres.
                    </div>
                    @error('email')
                        <div class="text-danger mt-1" style="font-family: 'Georgia', serif; font-size: 0.875rem;">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-paper-plane me-2"></i>
                        Herstellink Versturen
                    </button>
                </div>
            </form>
            
            <hr class="journal-divider my-4">
            
            <div class="text-center">
                <p class="mb-2" style="font-family: 'Georgia', serif; color: var(--text-secondary);">
                    Weet je het weer?
                </p>
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" style="font-family: 'Georgia', serif;">
                    <i class="fas fa-sign-in-alt me-1"></i>
                    Inloggen
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary" style="font-family: 'Georgia', serif;">
                    <i class="fas fa-user-plus me-1"></i>
                    Registreren
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
