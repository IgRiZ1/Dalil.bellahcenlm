@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </h1>
            <div>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary me-2">
                    <i class="fas fa-edit me-1"></i>
                    Profiel Bewerken
                </a>
                @if($isAdmin)
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-cog me-1"></i>
                        Beheer
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Welkomstkaart -->
    <div class="col-md-12 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="fas fa-user me-2"></i>
                    Welkom, {{ $user->name }}!
                </h4>
                <p class="card-text">
                    U bent ingelogd als {{ $user->username }}. 
                    @if($user->isAdmin)
                        U heeft beheerder rechten en kunt alle functionaliteiten gebruiken.
                    @else
                        U kunt uw profiel bewerken en de website verkennen.
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    <!-- Recente Nieuws -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i>
                    Recente Nieuws
                </h5>
            </div>
            <div class="card-body">
                @if($recentNews->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentNews as $news)
                            <a href="{{ route('news.show', $news) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $news->title }}</h6>
                                    <small class="text-muted">{{ $news->published_at->format('d/m/Y') }}</small>
                                </div>
                                <p class="mb-1">{{ Str::limit($news->content, 100) }}</p>
                            </a>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                            Bekijk Alle Nieuws
                        </a>
                    </div>
                @else
                    <p class="text-muted text-center">Nog geen nieuws beschikbaar.</p>
                @endif
            </div>
        </div>
    </div>
    
    <!-- FAQ Categorieën -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-question-circle me-2"></i>
                    FAQ Categorieën
                </h5>
            </div>
            <div class="card-body">
                @if($faqCategories->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($faqCategories as $category)
                            <div class="list-group-item">
                                <h6 class="mb-1">{{ $category->name }}</h6>
                                <p class="mb-1 text-muted">{{ $category->description }}</p>
                                <small class="text-muted">{{ $category->questions->count() }} vragen</small>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('faq.index') }}" class="btn btn-outline-success">
                            Bekijk Alle FAQ's
                        </a>
                    </div>
                @else
                    <p class="text-muted text-center">Nog geen FAQ categorieën beschikbaar.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@if($isAdmin && $adminStats)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>
                    Beheerder Statistieken
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <i class="fas fa-users fa-2x text-primary mb-2"></i>
                            <h4>{{ $adminStats['totalUsers'] }}</h4>
                            <p class="text-muted">Totaal Gebruikers</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <i class="fas fa-newspaper fa-2x text-success mb-2"></i>
                            <h4>{{ $adminStats['totalNews'] }}</h4>
                            <p class="text-muted">Totaal Nieuws</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <i class="fas fa-envelope fa-2x text-info mb-2"></i>
                            <h4>{{ $adminStats['totalContacts'] }}</h4>
                            <p class="text-muted">Contact Berichten</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                                <i class="fas fa-cog fa-2x text-warning mb-2"></i>
                                <h4 class="text-warning">Beheer</h4>
                                <p class="text-muted">Dashboard</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
