# B&U BundU - Laravel Backend

Backend API für die B&U BundU Website, gebaut mit Laravel 11 und Filament Admin Panel.

## Voraussetzungen

- PHP 8.2+
- Composer
- SQLite (für Entwicklung) oder PostgreSQL/MySQL (für Produktion)

## Installation

```bash
# In den backend Ordner wechseln
cd backend

# Dependencies installieren
composer install

# .env Datei erstellen
cp .env.example .env

# Application Key generieren
php artisan key:generate

# Datenbank-Migrationen ausführen
php artisan migrate

# Seed-Daten einfügen
php artisan db:seed

# Entwicklungsserver starten
php artisan serve
```

## API Endpoints

| Methode | Endpoint | Beschreibung |
|---------|----------|--------------|
| GET | `/api/ping` | Health Check |
| GET | `/api/globals` | Alle Global Settings |
| GET | `/api/globals/{key}` | Global Setting by Key (z.B. "site") |
| GET | `/api/pages/{slug}` | Seite nach Slug |
| GET | `/api/blog` | Alle Blog-Posts |
| GET | `/api/blog/{slug}` | Blog-Post nach Slug |

## Admin Panel

Nach dem Start ist das Admin Panel erreichbar unter:

- **URL**: http://localhost:8000/admin
- **Login**: admin@bundu.ch / changeme123

## Datenbank neu aufsetzen

```bash
# Alle Tabellen löschen und neu migrieren + seeden
php artisan migrate:fresh --seed
```

## Entwicklung

### Neue Migration erstellen
```bash
php artisan make:migration create_tablename_table
```

### Neuen Seeder erstellen
```bash
php artisan make:seeder SeederName
```

### Neues Filament Resource erstellen
```bash
php artisan make:filament-resource ModelName
```

## Deployment

Siehe Hauptverzeichnis `README_DEPLOY.md` für Deployment-Anweisungen.

## Struktur

```
backend/
├── app/
│   ├── Filament/Resources/   # Admin Panel Resources
│   ├── Http/Controllers/Api/ # API Controller
│   └── Models/               # Eloquent Models
├── database/
│   ├── migrations/           # Datenbank-Migrationen
│   └── seeders/              # Seed-Daten
├── routes/
│   └── api.php               # API Routes
└── config/
    └── cors.php              # CORS Konfiguration
```
