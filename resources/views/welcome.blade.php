@extends('layouts.app')

@section('title', 'Welkom bij Mijn Dagboek')

@section('content')
<!-- Hero Section -->
<div class="row justify-content-center mb-5">
    <div class="col-12">
        <div class="text-center">
            <h1 class="journal-title display-1 mb-4">
                <i class="fas fa-book-open me-3"></i>
                Welkom bij Mijn Dagboek
            </h1>
            <p class="lead text-muted mb-5" style="font-family: 'Georgia', serif; font-size: 1.3rem; max-width: 700px; margin: 0 auto; font-style: italic;">
                "Een leven onbeschreven is een verhaal dat nooit verteld wordt. Hier bewaren we onze herinneringen, 
                gedachten en momenten die ons leven vorm geven."
            </p>
            <hr class="journal-divider">
        </div>
    </div>
</div>

<!-- Main Sections -->
<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="journal-title text-center mb-5">Ontdek Mijn Verhalen</h2>
                
        <div class="row g-4">
            <!-- Recent Stories -->
            <div class="col-md-6 col-lg-3">
                <div class="journal-card text-center h-100">
                    <i class="fas fa-newspaper fa-4x mb-4" style="color: var(--text-accent);"></i>
                    <h5 class="h4 mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Verhalen</h5>
                    <p class="text-secondary mb-4" style="font-family: 'Georgia', serif;">
                        Lees de laatste verhalen, gedachten en ervaringen uit mijn dagboek.
                    </p>
                    <a href="{{ route('news.index') }}" class="btn btn-primary">
                        <i class="fas fa-book-reader me-2"></i>
                        Lees meer
                    </a>
                </div>
            </div>

            <!-- Questions & Answers -->
            <div class="col-md-6 col-lg-3">
                <div class="journal-card text-center h-100">
                    <i class="fas fa-question-circle fa-4x mb-4" style="color: var(--text-accent);"></i>
                    <h5 class="h4 mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Vragen</h5>
                    <p class="text-secondary mb-4" style="font-family: 'Georgia', serif;">
                        Vind antwoorden op veelgestelde vragen over het leven en deze website.
                    </p>
                    <a href="{{ route('faq.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-search me-2"></i>
                        Ontdek
                    </a>
                </div>
            </div>

            <!-- Contact -->
            <div class="col-md-6 col-lg-3">
                <div class="journal-card text-center h-100">
                    <i class="fas fa-envelope fa-4x mb-4" style="color: var(--text-accent);"></i>
                    <h5 class="h4 mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Contact</h5>
                    <p class="text-secondary mb-4" style="font-family: 'Georgia', serif;">
                        Neem contact op als je vragen hebt of gewoon een praatje wilt maken.
                    </p>
                    <a href="{{ route('contact.show') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-paper-plane me-2"></i>
                        Schrijf mij
                    </a>
                </div>
            </div>

            <!-- Personal Space -->
            <div class="col-md-6 col-lg-3">
                <div class="journal-card text-center h-100">
                    <i class="fas fa-user fa-4x mb-4" style="color: var(--text-accent);"></i>
                    <h5 class="h4 mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Mijn Plek</h5>
                    <p class="text-secondary mb-4" style="font-family: 'Georgia', serif;">
                        Creëer je eigen persoonlijke ruimte om je verhalen te delen.
                    </p>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary mb-2 w-100">
                            <i class="fas fa-user-plus me-2"></i>
                            Registreren
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Inloggen
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-primary w-100">
                            <i class="fas fa-home me-2"></i>
                            Mijn Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics -->
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <h2 class="journal-title text-center mb-5">Onze Gemeenschap</h2>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0" style="background: var(--paper-bg); box-shadow: var(--shadow-paper);">
                    <div class="card-body">
                        <div class="display-4 fw-bold mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">
                            {{ \App\Models\User::count() }}
                        </div>
                        <div style="color: var(--text-secondary); font-family: 'Georgia', serif;">
                            <i class="fas fa-users me-2"></i>
                            Schrijvers
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0" style="background: var(--paper-bg); box-shadow: var(--shadow-paper);">
                    <div class="card-body">
                        <div class="display-4 fw-bold mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">
                            {{ \App\Models\NewsItem::count() }}
                        </div>
                        <div style="color: var(--text-secondary); font-family: 'Georgia', serif;">
                            <i class="fas fa-book me-2"></i>
                            Verhalen
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0" style="background: var(--paper-bg); box-shadow: var(--shadow-paper);">
                    <div class="card-body">
                        <div class="display-4 fw-bold mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">
                            {{ \App\Models\FaqQuestion::count() }}
                        </div>
                        <div style="color: var(--text-secondary); font-family: 'Georgia', serif;">
                            <i class="fas fa-lightbulb me-2"></i>
                            Wijsheden
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0" style="background: var(--paper-bg); box-shadow: var(--shadow-paper);">
                    <div class="card-body">
                        <div class="display-4 fw-bold mb-2" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">
                            {{ \App\Models\Contact::count() }}
                        </div>
                        <div style="color: var(--text-secondary); font-family: 'Georgia', serif;">
                            <i class="fas fa-comments me-2"></i>
                            Gesprekken
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About This Journal -->
<div class="row justify-content-center mt-5">
    <div class="col-md-10 col-lg-8">
        <div class="journal-card">
            <h2 class="journal-title text-center mb-4">Over Dit Dagboek</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="fas fa-heart fa-3x mb-3" style="color: var(--text-accent);"></i>
                        <h5 class="mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Persoonlijk</h5>
                        <ul class="list-unstyled" style="font-family: 'Georgia', serif;">
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Authentieke verhalen</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Persoonlijke gedachten</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Oprechte emoties</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="fas fa-users fa-3x mb-3" style="color: var(--text-accent);"></i>
                        <h5 class="mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Gemeenschap</h5>
                        <ul class="list-unstyled" style="font-family: 'Georgia', serif;">
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Gedeelde ervaringen</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Ondersteunend netwerk</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Vriendelijke gesprekken</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="fas fa-seedling fa-3x mb-3" style="color: var(--text-accent);"></i>
                        <h5 class="mb-3" style="color: var(--text-accent); font-family: 'Playfair Display', serif;">Groei</h5>
                        <ul class="list-unstyled" style="font-family: 'Georgia', serif;">
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Persoonlijke ontwikkeling</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Levenslessen</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-feather me-2" style="color: var(--text-accent);"></i>
                                <span style="color: var(--text-secondary);">Inspiratie delen</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="journal-divider">
            <p class="text-center text-muted mb-0" style="font-family: 'Georgia', serif; font-style: italic;">
                "Het leven is als een boek. Elke dag schrijven we een nieuwe pagina."
            </p>
        </div>
    </div>
</div>
@endsection
