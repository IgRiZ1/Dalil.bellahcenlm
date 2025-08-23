@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 style="color: var(--primary-color); font-weight: 700;">
                <i class="fas fa-tachometer-alt me-3"></i>
                Dashboard
            </h1>
            <div>
                <a href="{{ route('profile.edit') }}" class="btn-modern-secondary me-3">
                    <i class="fas fa-edit"></i>
                    Profiel Bewerken
                </a>
                @if($isAdmin)
                    <a href="{{ route('admin.dashboard') }}" class="btn-modern-primary">
                        <i class="fas fa-cog"></i>
                        Beheer
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Welkomstkaart -->
    <div class="col-md-12 mb-5">
        <div class="modern-card" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-hover)); color: white; border: none;">
            <div class="modern-card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-white bg-opacity-20 rounded-circle p-3 me-4">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <div>
                        <h3 class="mb-1">Welkom terug, {{ $user->name }}!</h3>
                        <p class="mb-0 opacity-75">{{ $user->username }} • Laatste login: {{ now()->format('d M Y') }}</p>
                    </div>
                </div>
                <p class="mb-0 opacity-90">
                    @if($user->isAdmin())
                        <i class="fas fa-shield-alt me-2"></i>
                        U heeft beheerder rechten en kunt alle functionaliteiten van de website gebruiken.
                    @else
                        <i class="fas fa-star me-2"></i>
                        Welkom bij uw persoonlijke dashboard. Hier kunt u uw profiel beheren en de website verkennen.
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    <!-- Recente Nieuws -->
    <div class="col-md-6 mb-4">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0" style="color: var(--primary-color); font-weight: 600;">
                    <i class="fas fa-newspaper me-2"></i>
                    Recente Nieuws
                </h5>
            </div>
            <div class="modern-card-body">
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
                    <div class="text-center mt-4">
                        <a href="{{ route('news.index') }}" class="btn-modern-primary">
                            <i class="fas fa-arrow-right"></i>
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
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0" style="color: var(--primary-color); font-weight: 600;">
                    <i class="fas fa-question-circle me-2"></i>
                    FAQ Categorieën
                </h5>
            </div>
            <div class="modern-card-body">
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
                    <div class="text-center mt-4">
                        <a href="{{ route('faq.index') }}" class="btn-modern-secondary">
                            <i class="fas fa-arrow-right"></i>
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
<div class="row mt-4">
    <div class="col-md-12">
        <h4 class="mb-4" style="color: var(--text-primary); font-weight: 600;">
            <i class="fas fa-chart-bar me-2"></i>
            Beheerder Statistieken
        </h4>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
                    <i class="fas fa-users fa-2x mb-3"></i>
                    <div class="stat-number">{{ $adminStats['totalUsers'] }}</div>
                    <div class="stat-label">Totaal Gebruikers</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #10b981, #059669);">
                    <i class="fas fa-newspaper fa-2x mb-3"></i>
                    <div class="stat-number">{{ $adminStats['totalNews'] }}</div>
                    <div class="stat-label">Totaal Nieuws</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                    <i class="fas fa-envelope fa-2x mb-3"></i>
                    <div class="stat-number">{{ $adminStats['totalContacts'] }}</div>
                    <div class="stat-label">Contact Berichten</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                    <div class="stat-card" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-cog fa-2x mb-3"></i>
                        <div class="stat-number">Admin</div>
                        <div class="stat-label">Dashboard</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
