<nav class="navbar navbar-expand-lg modern-navbar">
    <div class="container">
        <a class="navbar-brand neon-pulse" href="{{ route('home') }}">
            <i class="fas fa-microchip me-2"></i>
            CYBER.NL
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-terminal me-1"></i>
                        SYSTEEM
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">
                        <i class="fas fa-satellite-dish me-1"></i>
                        DATA-FEED
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq.index') }}">
                        <i class="fas fa-database me-1"></i>
                        ARCHIEF
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.show') }}">
                        <i class="fas fa-broadcast-tower me-1"></i>
                        VERBINDING
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <!-- Cyber Mode Toggle -->
                <li class="nav-item d-flex align-items-center">
                    <button class="theme-toggle floating" id="themeToggle" title="Activeer Cyber Modus">
                        <i class="fas fa-bolt" id="themeIcon"></i>
                    </button>
                </li>
                
                @guest
                    <!-- Niet ingelogde gebruikers -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-key me-1"></i>
                            TOEGANG
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-shield me-1"></i>
                            REGISTRATIE
                        </a>
                    </li>
                @else
                    <!-- Ingelogde gebruikers -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show', Auth::user()->username) }}">
                                    <i class="fas fa-user me-2"></i>
                                    Mijn Profiel
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-edit me-2"></i>
                                    Profiel Bewerken
                                </a>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-cog me-2"></i>
                                        Beheer
                                    </a>
                                </li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Uitloggen
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
