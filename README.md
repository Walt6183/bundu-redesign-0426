# BundU Redesign

Website-Redesign fuer **B&U BundU** — gebaut mit Laravel 12, Filament 3, Livewire 3 und Tailwind CSS v4.

**Live:** https://bundu.ch

---

## Tech Stack

| Komponente | Version |
|---|---|
| Laravel | 12.46.0 |
| Filament | 3.3.46 (Admin-Panel) |
| Livewire | 3.7.3 |
| Tailwind CSS | v4 |
| Vite | Build-Tool |
| PHP | 8.3+ |

## Features

- **8 Filament Resources** — Angebote, Themen, Impulse, Downloads, FAQs, Referenzen, Team, Site-Config
- **19 Frontend-Routen** — Alle mit SEO (Canonical, OG-Tags, JSON-LD Schema.org)
- **Livewire-Formulare** — Kontaktformular + Kursanmeldung mit Validierung
- **XML-Sitemap** — Automatisch generiert
- **Responsive Design** — Bricolage Grotesque + Instrument Sans, Navy/Teal Farbschema
- **ContentSeeder** — 30+ vordefinierte Inhalte

## Projektstruktur

```
app/
├── Filament/Resources/     # 8 Admin-Resources
├── Http/Controllers/       # Frontend-Controller
├── Livewire/               # ContactForm, CourseRegistration
└── Models/                 # 8 Eloquent Models
database/
├── migrations/             # 8 Migrations
└── seeders/                # ContentSeeder + DatabaseSeeder
resources/views/
├── components/             # section, hero, card, breadcrumb
├── layouts/                # app.blade.php
└── pages/                  # Alle Frontend-Seiten
public/
└── build/                  # Vite Production Assets
```

## Setup (Lokal)

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

Admin-Panel: http://localhost:8000/admin

## Design Tokens

| Token | Wert |
|---|---|
| Navy | `#0F2040` |
| Teal | `#079BB8` |
| Light | `#F5F6F8` |
| Ink | `#1A1A2E` |
| Font Headings | Bricolage Grotesque |
| Font Body | Instrument Sans |

## Deployment

Gehostet auf **Hostpoint Shared Hosting** (PHP 8.3, MariaDB 10.11).

Deployment via FTPS ZIP-Upload mit `_deploy.php` Helper-Script:
1. `npm run build` (Vite Production Build)
2. ZIP erstellen und per FTPS hochladen
3. Auf Server: Entpacken, `composer install --no-dev`, `php artisan optimize`

## Git History

| Commit | Phase |
|---|---|
| 901e07c | Initial: Laravel 12 + Filament v3 Basis |
| 81e57a9 | Phase 1: Filament Resources, Migrationen, Models, Layout |
| f3e9491 | Phase 2: Core-Seiten, Blade-Komponenten, Livewire |
| b9fc410 | Phase 3: Dynamische Inhalte, Controller, Detail-Seiten |
| a003ecd | Phase 4: Content-System, SEO, Sitemap, Seeder |
| c463d3f | Bugfix: Component Resolution + JSON-LD Escaping |
| 085831e | Phase 5: QA + Production Deployment |

## Copyright

&copy; 2026 B&U BundU. Alle Rechte vorbehalten.
