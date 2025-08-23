@extends('layouts.app')

@section('title', 'Wachtwoord Vergeten')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h3 class="text-center mb-0">
                    <i class="fas fa-key me-2"></i>
                    Wachtwoord Vergeten
                </h3>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <p class="text-muted">
                        Voer uw e-mailadres in en wij sturen u een link om uw wachtwoord opnieuw in te stellen.
                    </p>
                </div>
                
                <form method="POST" action="{{ route('password.email') }}">
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
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-paper-plane me-2"></i>
                            Wachtwoord Reset Link Versturen
                        </button>
                    </div>
                </form>
                
                <hr>
                
                <div class="text-center">
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>
                        Terug naar Inloggen
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
