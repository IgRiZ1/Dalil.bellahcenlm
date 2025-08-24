@extends('layouts.app')

@section('title', 'Registreren - Mijn Dagboek')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="journal-card">
            <div class="text-center mb-4">
                <i class="fas fa-feather fa-4x mb-3" style="color: var(--text-accent);"></i>
                <h1 class="h3 mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif; font-style: italic;">
                    Begin Je Verhaal
                </h1>
                <p class="text-muted" style="font-family: 'Georgia', serif;">
                    Registreer je om je eigen dagboek te beginnen
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label" style="font-family: 'Playfair Display', serif; color: var(--text-accent);">
                        Volledige Naam
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: var(--bg-card); border-color: var(--ink-border);">
                            <i class="fas fa-user" style="color: var(--text-accent);"></i>
                        </span>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required autofocus
                               style="border-left: 0;">
                    </div>
                    @error('name')
                        <div class="text-danger mt-1" style="font-family: 'Georgia', serif; font-size: 0.875rem;">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="username" class="form-label" style="font-family: 'Playfair Display', serif; color: var(--text-accent);">
                        Schrijversnaam
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: var(--bg-card); border-color: var(--ink-border);">
                            <i class="fas fa-pen-nib" style="color: var(--text-accent);"></i>
                        </span>
                        <input type="text" 
                               class="form-control @error('username') is-invalid @enderror" 
                               id="username" 
                               name="username" 
                               value="{{ old('username') }}" 
                               required
                               style="border-left: 0;">
                    </div>
                    <div class="form-text" style="font-family: 'Georgia', serif; font-size: 0.875rem; color: var(--text-muted);">
                        Deze naam wordt getoond op je profiel en bij je verhalen.
                    </div>
                    @error('username')
                        <div class="text-danger mt-1" style="font-family: 'Georgia', serif; font-size: 0.875rem;">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
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
                               required
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
                    <label for="password_confirmation" class="form-label" style="font-family: 'Playfair Display', serif; color: var(--text-accent);">
                        Bevestig Wachtwoord
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: var(--bg-card); border-color: var(--ink-border);">
                            <i class="fas fa-lock" style="color: var(--text-accent);"></i>
                        </span>
                        <input type="password" 
                               class="form-control" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required
                               style="border-left: 0;">
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" style="font-family: 'Playfair Display', serif;">
                        <i class="fas fa-pen-alt me-2"></i>
                        Mijn Verhaal Beginnen
                    </button>
                </div>
            </form>
            
            <hr class="journal-divider my-4">
            
            <div class="text-center">
                <p class="mb-2" style="font-family: 'Georgia', serif; color: var(--text-secondary);">
                    Al een account?
                </p>
                <a href="{{ route('login') }}" class="btn btn-outline-primary" style="font-family: 'Georgia', serif;">
                    <i class="fas fa-sign-in-alt me-1"></i>
                    Inloggen
                </a>
            </div>
        </div>
    </div>
</div>
@endsection