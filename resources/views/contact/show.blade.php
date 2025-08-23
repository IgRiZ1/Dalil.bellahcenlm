@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h1 class="text-center mb-0">
                    <i class="fas fa-envelope me-2"></i>
                    Contact
                </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Neem Contact Op</h4>
                        <p class="text-muted mb-4">
                            Heeft u vragen of opmerkingen? Vul het formulier in en wij nemen zo spoedig mogelijk contact met u op.
                        </p>
                        
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Naam *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mailadres *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Onderwerp *</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                       id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Bericht *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Bericht Versturen
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-md-6">
                        <h4>Contact Informatie</h4>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-map-marker-alt text-info me-2"></i>
                                    <strong>Adres:</strong><br>
                                    Erasmushogeschool Brussel<br>
                                    Nijverheidskaai 170<br>
                                    1070 Anderlecht
                                </div>
                                
                                <div class="mb-3">
                                    <i class="fas fa-envelope text-info me-2"></i>
                                    <strong>E-mail:</strong><br>
                                    <a href="mailto:info@ehb.be">info@ehb.be</a>
                                </div>
                                
                                <div class="mb-3">
                                    <i class="fas fa-phone text-info me-2"></i>
                                    <strong>Telefoon:</strong><br>
                                    <a href="tel:+3225261111">+32 2 526 11 11</a>
                                </div>
                                
                                <div class="mb-3">
                                    <i class="fas fa-clock text-info me-2"></i>
                                    <strong>Openingstijden:</strong><br>
                                    Maandag - Vrijdag: 9:00 - 17:00<br>
                                    Weekend: Gesloten
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5>Volg Ons</h5>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-info">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection