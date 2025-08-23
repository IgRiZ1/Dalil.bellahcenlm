# Mijn Website - Laravel 12 Project

## Projectbeschrijving

Dit is een dynamische website gebouwd met Laravel 12 voor het vak Backend Web. De website biedt een volledig functioneel content management systeem met gebruikersbeheer, nieuwsbeheer, FAQ systeem en contact functionaliteit.

## Functionaliteiten

### 🔐 Authenticatie & Gebruikersbeheer
- **Registratie**: Gebruikers kunnen een nieuw account aanmaken
- **Login/Logout**: Veilige authenticatie met "onthoud mij" functionaliteit
- **Wachtwoord Reset**: Mogelijkheid om wachtwoord te resetten bij vergeten wachtwoord
- **Profielbeheer**: Gebruikers kunnen hun profiel bewerken inclusief profielfoto
- **Admin Systeem**: Beheerders hebben toegang tot extra functionaliteiten

### 📰 Nieuwsbeheer
- **Nieuwsitems Bekijken**: Alle bezoekers kunnen nieuws bekijken
- **Nieuwsitems Beheren**: Alleen admins kunnen nieuws toevoegen, bewerken en verwijderen
- **Afbeeldingen**: Ondersteuning voor afbeeldingen bij nieuwsitems
- **Publicatiedatum**: Controle over wanneer nieuws zichtbaar wordt

### ❓ FAQ Systeem
- **Categorieën**: FAQ's zijn georganiseerd in categorieën
- **Vragen & Antwoorden**: Volledig beheer van FAQ content
- **Admin Beheer**: Alleen admins kunnen FAQ's aanmaken en bewerken

### 📧 Contact Systeem
- **Contactformulier**: Bezoekers kunnen berichten sturen
- **Admin Notificaties**: Admins ontvangen contactberichten
- **Berichtenbeheer**: Admins kunnen contactberichten bekijken en beheren

### 👥 Admin Dashboard
- **Gebruikersbeheer**: Gebruikers aanmaken, bewerken en verwijderen
- **Admin Rechten**: Gebruikers bevorderen tot admin of afzetten
- **Statistieken**: Overzicht van gebruikers, nieuws en contactberichten
- **Content Beheer**: Volledige controle over alle content

## Technische Vereisten Implementatie

### Views
- **Twee Layouts**: `app.blade.php` (hoofdlayout) en `admin.blade.php` (admin layout)
- **Componenten**: `navbar.blade.php` voor navigatie
- **Blade Templates**: Gebruik van Blade syntax en control structures

### Control Structures
- **XSS Protection**: Alle output wordt geëscaped met `{{ }}` syntax
- **CSRF Protection**: Alle formulieren bevatten `@csrf` directive
- **Client-side Validation**: HTML5 validatie attributen op alle formuliervelden

### Routes
- **Controller Methods**: Alle routes gebruiken controller methods
- **Middleware**: `auth` en `admin` middleware voor beveiliging
- **Route Groepering**: Admin routes gegroepeerd onder `/admin` prefix

### Controllers
- **Resource Controllers**: CRUD operaties voor alle modellen
- **Logica Scheiding**: Business logic in controllers, niet in views
- **Validatie**: Server-side validatie met Laravel Validator

### Models
- **Eloquent Models**: Volledige Eloquent implementatie
- **Relaties**: 
  - One-to-Many: User → NewsItems, User → FaqCategories
  - Many-to-Many: FaqCategories ↔ FaqQuestions
- **Scopes**: `published()` scope voor nieuwsitems

### Database
- **Migraties**: Volledige database structuur gedefinieerd
- **Seeders**: Voorbeelddata en default admin account
- **Foreign Keys**: Proper relaties tussen tabellen

### Authentication
- **Standaard Functionaliteiten**: Login, logout, registratie, wachtwoord reset
- **Remember Me**: "Onthoud mij" functionaliteit
- **Default Admin**: Username: `admin`, Email: `admin@ehb.be`, Password: `Password!321`

## Installatiehandleiding

### Vereisten
- PHP 8.2 of hoger
- Composer
- MySQL/PostgreSQL/SQLite
- Node.js en NPM (voor Vite)

### Stap 1: Project Klonen
```bash
git clone <repository-url>
cd mijn-website
```

### Stap 2: Dependencies Installeren
```bash
composer install
npm install
```

### Stap 3: Environment Configuratie
```bash
cp .env.example .env
php artisan key:generate
```

### Stap 4: Database Configuratie
Bewerk `.env` bestand met je database instellingen:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mijn_website
DB_USERNAME=root
DB_PASSWORD=
```

### Stap 5: Database Migreren en Seeden
```bash
php artisan migrate:fresh --seed
```

### Stap 6: Storage Link Maken
```bash
php artisan storage:link
```

### Stap 7: Applicatie Starten
```bash
php artisan serve
npm run dev
```

De applicatie is nu beschikbaar op `http://localhost:8000`

### Default Admin Account
- **Username**: admin
- **Email**: admin@ehb.be
- **Password**: Password!321

## Project Structuur

```
app/
├── Http/
│   ├── Controllers/          # Alle controllers
│   └── Middleware/           # Custom middleware
├── Models/                   # Eloquent models
├── Policies/                 # Authorization policies
└── Providers/                # Service providers

database/
├── migrations/               # Database migraties
└── seeders/                  # Database seeders

resources/
└── views/                    # Blade templates
    ├── auth/                 # Authenticatie views
    ├── admin/                # Admin views
    ├── dashboard/            # Dashboard views
    ├── layouts/              # Layout templates
    └── components/           # Reusable components

routes/
└── web.php                   # Web routes
```

## Screenshots

### Homepage
![Homepage](screenshots/homepage.png)

### Dashboard
![Dashboard](screenshots/dashboard.png)

### Admin Panel
![Admin Panel](screenshots/admin-panel.png)

### Nieuws Overzicht
![Nieuws](screenshots/news.png)

### FAQ Pagina
![FAQ](screenshots/faq.png)

## Gebruikte Bronnen

### Documentatie
- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Laravel Blade Templates](https://laravel.com/docs/12.x/blade)
- [Laravel Eloquent ORM](https://laravel.com/docs/12.x/eloquent)

### Packages & Libraries
- [Bootstrap 5](https://getbootstrap.com/) - CSS Framework
- [Font Awesome](https://fontawesome.com/) - Iconen
- [Vite](https://vitejs.dev/) - Build tool

### AI Assistentie
- Deze applicatie is ontwikkeld met behulp van AI assistentie voor code generatie en documentatie

## Ontwikkelaar

**Naam**: [Jouw Naam]  
**Student**: [Student Nummer]  
**Vak**: Backend Web  
**Instituut**: Erasmushogeschool Brussel  
**Datum**: Augustus 2024  

## Licentie

Dit project is ontwikkeld voor educatieve doeleinden als onderdeel van het vak Backend Web.

---

**Let op**: Dit is een herexamen project. Alle functionaliteiten zijn volledig geïmplementeerd volgens de vereisten van de opdracht.
