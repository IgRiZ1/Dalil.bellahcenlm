@extends('layouts.admin')

@section('title', 'Beheer Dashboard')
@section('page-title', 'Beheer Dashboard')

@section('content')
<div class="row">
    <!-- Statistieken -->
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h3>{{ $totalUsers }}</h3>
                <p class="mb-0">Totaal Gebruikers</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-user-shield fa-3x mb-3"></i>
                <h3>{{ $totalAdmins }}</h3>
                <p class="mb-0">Beheerders</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <i class="fas fa-newspaper fa-3x mb-3"></i>
                <h3>{{ \App\Models\NewsItem::count() }}</h3>
                <p class="mb-0">Nieuwsitems</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-dark">
            <div class="card-body text-center">
                <i class="fas fa-envelope fa-3x mb-3"></i>
                <h3>{{ \App\Models\Contact::count() }}</h3>
                <p class="mb-0">Contact Berichten</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Snelle Acties -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>
                    Snelle Acties
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>
                        Nieuwe Gebruiker
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                        <i class="fas fa-newspaper me-2"></i>
                        Nieuw Nieuwsitem
                    </a>
                    <a href="{{ route('admin.faq.categories.create') }}" class="btn btn-info">
                        <i class="fas fa-folder-plus me-2"></i>
                        Nieuwe FAQ Categorie
                    </a>
                    <a href="{{ route('admin.faq.questions.create') }}" class="btn btn-warning">
                        <i class="fas fa-question-circle me-2"></i>
                        Nieuwe FAQ Vraag
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recente Gebruikers -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>
                    Recente Gebruikers
                </h5>
            </div>
            <div class="card-body">
                @if($recentUsers->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentUsers as $user)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">{{ $user->name }}</h6>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                                <div>
                                    @if($user->is_admin)
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">Gebruiker</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('admin.users') }}" class="btn btn-outline-primary">
                            Bekijk Alle Gebruikers
                        </a>
                    </div>
                @else
                    <p class="text-muted text-center">Nog geen gebruikers.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Systeem Informatie -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Systeem Informatie
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Laravel Versie</h6>
                        <p class="text-muted">{{ app()->version() }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6>PHP Versie</h6>
                        <p class="text-muted">{{ phpversion() }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6>Database</h6>
                        <p class="text-muted">{{ config('database.default') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
