@extends('layouts.app')

@section('title', 'CYBER PORTAL')

@section('content')
<!-- Hero Section -->
<div class="row justify-content-center mb-5">
    <div class="col-12">
        <div class="text-center">
            <h1 class="cyber-title display-1 mb-4 neon-pulse">
                <i class="fas fa-microchip me-3"></i>
                CYBER PORTAL ACTIEF
            </h1>
            <div class="status-indicator online"></div>
            <span class="cyber-text h4">SYSTEEM ONLINE - TOEGANG VERLEEND</span>
            <hr class="cyber-divider">
            <p class="lead text-secondary mb-5" style="font-family: 'Rajdhani', monospace; font-size: 1.4rem; max-width: 800px; margin: 0 auto;">
                Welkom in het geavanceerde data-netwerk. Dit platform biedt hoogwaardige functionaliteiten 
                voor gebruikersbeheer, real-time informatiestromen en beveiligde communicatie.
            </p>
        </div>
    </div>
</div>

<!-- Main System Modules -->
<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="cyber-title text-center mb-5">SYSTEEM MODULES</h2>
                
        <div class="row g-4">
            <!-- Data Feed Module -->
            <div class="col-md-6 col-lg-3">
                <div class="modern-card hover-lift floating text-center h-100">
                    <div class="modern-card-body">
                        <i class="fas fa-satellite-dish fa-4x mb-4" style="color: var(--primary-neon); text-shadow: var(--shadow-neon);"></i>
                        <h5 class="cyber-text h4 mb-3">DATA-FEED</h5>
                        <p class="text-secondary mb-4">Toegang tot real-time informatiestromen en updates uit het netwerk.</p>
                        <a href="{{ route('news.index') }}" class="btn-modern-primary w-100">
                            <i class="fas fa-arrow-right me-2"></i>
                            VERBINDEN
                        </a>
                    </div>
                </div>
            </div>

            <!-- Archive Module -->
            <div class="col-md-6 col-lg-3">
                <div class="modern-card hover-lift floating text-center h-100" style="animation-delay: 0.5s;">
                    <div class="modern-card-body">
                        <i class="fas fa-database fa-4x mb-4" style="color: var(--accent-neon); text-shadow: var(--shadow-green);"></i>
                        <h5 class="cyber-text h4 mb-3">ARCHIEF</h5>
                        <p class="text-secondary mb-4">Doorzoek de kennisdatabase voor antwoorden en informatie.</p>
                        <a href="{{ route('faq.index') }}" class="btn-modern-secondary w-100">
                            <i class="fas fa-search me-2"></i>
                            DOORZOEKEN
                        </a>
                    </div>
                </div>
            </div>

            <!-- Communication Module -->
            <div class="col-md-6 col-lg-3">
                <div class="modern-card hover-lift floating text-center h-100" style="animation-delay: 1s;">
                    <div class="modern-card-body">
                        <i class="fas fa-broadcast-tower fa-4x mb-4" style="color: var(--secondary-neon); text-shadow: var(--shadow-pink);"></i>
                        <h5 class="cyber-text h4 mb-3">VERBINDING</h5>
                        <p class="text-secondary mb-4">Etableer beveiligde communicatiekanalen met het netwerk.</p>
                        <a href="{{ route('contact.show') }}" class="btn-modern-primary w-100">
                            <i class="fas fa-signal me-2"></i>
                            ACTIVEREN
                        </a>
                    </div>
                </div>
            </div>

            <!-- Access Module -->
            <div class="col-md-6 col-lg-3">
                <div class="modern-card hover-lift floating text-center h-100" style="animation-delay: 1.5s;">
                    <div class="modern-card-body">
                        <i class="fas fa-user-shield fa-4x mb-4" style="color: var(--warning-neon); text-shadow: 0 0 20px var(--warning-neon);"></i>
                        <h5 class="cyber-text h4 mb-3">TOEGANG</h5>
                        <p class="text-secondary mb-4">Verkrijg geautoriseerde toegang tot het beveiligde systeem.</p>
                        @guest
                            <a href="{{ route('register') }}" class="btn-modern-primary w-100 mb-2">
                                <i class="fas fa-key me-2"></i>
                                REGISTREER
                            </a>
                            <a href="{{ route('login') }}" class="btn-modern-secondary w-100">
                                <i class="fas fa-unlock me-2"></i>
                                INLOGGEN
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="btn-modern-primary w-100">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                DASHBOARD
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Statistics -->
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <h2 class="cyber-title text-center mb-5">SYSTEEM STATUS</h2>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card floating">
                    <div class="stat-number">{{ \App\Models\User::count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-users me-2"></i>
                        ACTIEVE GEBRUIKERS
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card floating" style="animation-delay: 0.3s;">
                    <div class="stat-number">{{ \App\Models\NewsItem::count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-satellite-dish me-2"></i>
                        DATA STREAMS
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card floating" style="animation-delay: 0.6s;">
                    <div class="stat-number">{{ \App\Models\FaqQuestion::count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-database me-2"></i>
                        ARCHIEF RECORDS
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card floating" style="animation-delay: 0.9s;">
                    <div class="stat-number">{{ \App\Models\Contact::count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-broadcast-tower me-2"></i>
                        VERBINDINGEN
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Capabilities -->
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <h2 class="cyber-title text-center mb-5">SYSTEEM MOGELIJKHEDEN</h2>
        <div class="modern-card glass-panel">
            <div class="modern-card-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-shield-alt fa-3x mb-3" style="color: var(--accent-neon); text-shadow: var(--shadow-green);"></i>
                            <h5 class="cyber-text mb-3">BEVEILIGING</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--accent-neon);"></i>
                                    <span style="color: var(--text-secondary);">GECODEERDE AUTHENTICATIE</span>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--accent-neon);"></i>
                                    <span style="color: var(--text-secondary);">PROFIEL ENCRYPTIE</span>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--accent-neon);"></i>
                                    <span style="color: var(--text-secondary);">BEVEILIGDE ROUTES</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-network-wired fa-3x mb-3" style="color: var(--primary-neon); text-shadow: var(--shadow-neon);"></i>
                            <h5 class="cyber-text mb-3">NETWERK</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--primary-neon);"></i>
                                    <span style="color: var(--text-secondary);">DATA-FLOW BEHEER</span>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--primary-neon);"></i>
                                    <span style="color: var(--text-secondary);">COMMUNICATIE HUB</span>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--primary-neon);"></i>
                                    <span style="color: var(--text-secondary);">ADMIN TERMINAL</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-microchip fa-3x mb-3" style="color: var(--secondary-neon); text-shadow: var(--shadow-pink);"></i>
                            <h5 class="cyber-text mb-3">TECHNOLOGIE</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--secondary-neon);"></i>
                                    <span style="color: var(--text-secondary);">ADAPTIEF INTERFACE</span>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--secondary-neon);"></i>
                                    <span style="color: var(--text-secondary);">QUANTUM FRAMEWORK</span>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle me-2" style="color: var(--secondary-neon);"></i>
                                    <span style="color: var(--text-secondary);">NEURAL NET CORE</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
