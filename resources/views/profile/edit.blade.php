@extends('layouts.app')

@section('title', 'Profiel Bewerken')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="modern-card">
            <div class="modern-card-header">
                <h3 class="mb-0">
                    <i class="fas fa-user-edit me-2"></i>
                    Profiel Bewerken
                </h3>
            </div>
            <div class="modern-card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="modern-form-label">Volledige Naam *</label>
                                <input type="text" class="modern-form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="modern-form-label">Gebruikersnaam *</label>
                                <input type="text" class="modern-form-control @error('username') is-invalid @enderror" 
                                       id="username" name="username" value="{{ old('username', $user->username) }}" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="modern-form-label">E-mailadres</label>
                        <input type="email" class="modern-form-control" 
                               id="email" value="{{ $user->email }}" readonly disabled>
                        <div class="form-text">E-mailadres kan niet worden gewijzigd.</div>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="modern-form-label">Verjaardag</label>
                        <input type="date" class="modern-form-control @error('birthday') is-invalid @enderror" 
                               id="birthday" name="birthday" value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '') }}">
                        @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="about_me" class="modern-form-label">Over mij</label>
                        <textarea class="modern-form-control @error('about_me') is-invalid @enderror" 
                                  id="about_me" name="about_me" rows="4" maxlength="1000" 
                                  placeholder="Vertel iets over jezelf...">{{ old('about_me', $user->about_me) }}</textarea>
                        <div class="form-text">Maximaal 1000 karakters</div>
                        @error('about_me')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="profile_photo" class="modern-form-label">Profielfoto</label>
                        
                        @if($user->profile_photo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                                     alt="Huidige profielfoto" 
                                     class="rounded-circle" 
                                     style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="form-text">Huidige profielfoto</div>
                            </div>
                        @endif
                        
                        <input type="file" class="modern-form-control @error('profile_photo') is-invalid @enderror" 
                               id="profile_photo" name="profile_photo" accept="image/*">
                        <div class="form-text">
                            Toegestane formaten: JPEG, PNG, JPG, GIF. Maximale grootte: 2MB
                            @if($user->profile_photo)
                                <br>Upload een nieuwe foto om de huidige te vervangen
                            @endif
                        </div>
                        @error('profile_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('profile.show', $user->username) }}" class="btn btn-modern-secondary">
                            <i class="fas fa-arrow-left"></i> Terug naar Profiel
                        </a>
                        
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-modern-secondary me-2">
                                <i class="fas fa-times"></i> Annuleren
                            </a>
                            <button type="submit" class="btn btn-modern-primary">
                                <i class="fas fa-save"></i> Wijzigingen Opslaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection