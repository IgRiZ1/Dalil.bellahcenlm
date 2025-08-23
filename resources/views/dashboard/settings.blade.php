@extends('layouts.app')

@section('title', 'Instellingen - Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="modern-card">
            <div class="modern-card-header">
                <h3 class="mb-0">
                    <i class="fas fa-cog me-2"></i>
                    Account Instellingen
                </h3>
            </div>
            <div class="modern-card-body">
                
                <!-- Account Informatie -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h5>Account Informatie</h5>
                        <p class="text-muted">Bekijk en beheer je basis account gegevens.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Naam:</strong></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gebruikersnaam:</strong></td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>E-mailadres:</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Account type:</strong></td>
                                        <td>
                                            @if($user->is_admin)
                                                <span class="badge bg-primary">
                                                    <i class="fas fa-crown me-1"></i> Beheerder
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">Gebruiker</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lid sinds:</strong></td>
                                        <td>{{ $user->created_at->format('d F Y') }}</td>
                                    </tr>
                                </table>
                                
                                <div class="text-end">
                                    <a href="{{ route('profile.edit') }}" class="btn btn-modern-primary">
                                        <i class="fas fa-edit"></i> Profiel Bewerken
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Profiel Instellingen -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h5>Profiel & Privacy</h5>
                        <p class="text-muted">Beheer hoe anderen je profiel kunnen zien.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-1">Publiek Profiel</h6>
                                        <small class="text-muted">Je profiel is zichtbaar voor andere gebruikers</small>
                                    </div>
                                    <div>
                                        <a href="{{ route('profile.show', $user->username) }}" 
                                           class="btn btn-sm btn-modern-secondary">
                                            <i class="fas fa-eye"></i> Bekijken
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Profielfoto</h6>
                                        <small class="text-muted">
                                            @if($user->profile_photo)
                                                Je hebt een profielfoto ingesteld
                                            @else
                                                Geen profielfoto ingesteld
                                            @endif
                                        </small>
                                    </div>
                                    <div>
                                        @if($user->profile_photo)
                                            <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                                                 alt="{{ $user->name }}" 
                                                 class="rounded-circle me-2" 
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <a href="{{ route('profile.edit') }}" 
                                           class="btn btn-sm btn-modern-secondary">
                                            <i class="fas fa-edit"></i> Wijzigen
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Admin Functies -->
                @if($user->is_admin)
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h5>Beheer Functies</h5>
                            <p class="text-muted">Toegang tot administratieve functies.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-crown me-2"></i>
                                        Administrator Rechten
                                    </h6>
                                    
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <a href="{{ route('admin.dashboard') }}" 
                                               class="btn btn-modern-primary w-100">
                                                <i class="fas fa-tachometer-alt"></i> Admin Dashboard
                                            </a>
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <a href="{{ route('admin.users') }}" 
                                               class="btn btn-modern-secondary w-100">
                                                <i class="fas fa-users"></i> Gebruikers Beheren
                                            </a>
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <a href="{{ route('admin.news.create') }}" 
                                               class="btn btn-modern-secondary w-100">
                                                <i class="fas fa-newspaper"></i> Nieuws Beheren
                                            </a>
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <a href="{{ route('admin.contact.index') }}" 
                                               class="btn btn-modern-secondary w-100">
                                                <i class="fas fa-envelope"></i> Contact Berichten
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                @endif

                <!-- Account Acties -->
                <div class="row">
                    <div class="col-md-4">
                        <h5>Account Acties</h5>
                        <p class="text-muted">Belangrijke account acties en instellingen.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-1">Dashboard</h6>
                                        <small class="text-muted">Ga terug naar je hoofddashboard</small>
                                    </div>
                                    <div>
                                        <a href="{{ route('dashboard') }}" class="btn btn-modern-secondary">
                                            <i class="fas fa-home"></i> Dashboard
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Uitloggen</h6>
                                        <small class="text-muted">Beëindig je huidige sessie</small>
                                    </div>
                                    <div>
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fas fa-sign-out-alt"></i> Uitloggen
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection