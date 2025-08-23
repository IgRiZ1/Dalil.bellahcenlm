<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mijn Website')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navigatie -->
    @include('components.navbar')
    
    <!-- Hoofdinhoud -->
    <main class="py-3">
        <div class="container">
            <!-- Succes en foutmeldingen -->
            @if(session('success'))
                <div class="modern-alert modern-alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="modern-alert modern-alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <!-- Pagina inhoud -->
            @yield('content')
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="modern-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h6 style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.25rem;">
                        <i class="fas fa-globe me-2"></i>
                        Mijn Website
                    </h6>
                    <p class="text-muted mb-0" style="font-size: 0.875rem;">Een moderne, gebruiksvriendelijke website</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted mb-1" style="font-size: 0.875rem;">&copy; {{ date('Y') }} Alle rechten voorbehouden</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dark Mode Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const body = document.body;
            
            // Check for saved theme or default to light mode
            const currentTheme = localStorage.getItem('theme') || 'light';
            body.setAttribute('data-theme', currentTheme);
            
            // Update icon based on current theme
            if (currentTheme === 'dark') {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
            
            // Toggle theme on button click
            themeToggle.addEventListener('click', function() {
                const currentTheme = body.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                body.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                
                // Update icon
                if (newTheme === 'dark') {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                } else {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                }
                
                // Add animation effect
                themeToggle.style.transform = 'scale(1.2) rotate(360deg)';
                setTimeout(() => {
                    themeToggle.style.transform = '';
                }, 300);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
