<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Beheer') - Mijn Website</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">Beheer</h4>
                    </div>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        
                        <!-- Gebruikersbeheer -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.users') }}">
                                <i class="fas fa-users me-2"></i>
                                Gebruikers
                            </a>
                        </li>
                        
                        <!-- Nieuwsbeheer -->
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-newspaper me-2"></i>
                                Nieuws
                            </a>
                            <ul class="dropdown-menu bg-dark border-0">
                                <li><a class="dropdown-item text-white" href="{{ route('news.index') }}">Alle Artikelen</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('admin.news.create') }}">Nieuw Artikel</a></li>
                            </ul>
                        </li>
                        
                        <!-- FAQ Beheer -->
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-question-circle me-2"></i>
                                FAQ
                            </a>
                            <ul class="dropdown-menu bg-dark border-0">
                                <li><a class="dropdown-item text-white" href="{{ route('faq.index') }}">Alle FAQ's</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('admin.faq.categories.create') }}">Nieuwe Categorie</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('admin.faq.questions.create') }}">Nieuwe Vraag</a></li>
                            </ul>
                        </li>
                        
                        <!-- Contact Berichten -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.contact.index') }}">
                                <i class="fas fa-envelope me-2"></i>
                                Contact Berichten
                            </a>
                        </li>
                        
                        <li class="nav-item mt-3">
                            <a class="nav-link text-white" href="{{ route('dashboard') }}">
                                <i class="fas fa-arrow-left me-2"></i>
                                Terug naar website
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <!-- Hoofdinhoud -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('page-title', 'Beheer')</h1>
                </div>
                
                <!-- Succes en foutmeldingen -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <!-- Pagina inhoud -->
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
