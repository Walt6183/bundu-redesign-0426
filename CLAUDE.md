# BundU Redesign — Projektstatus

**Stand:** 09.04.2026  
**URL:** https://bundu.ch  
**Repository:** Walt6183/bundu-redesign-0426  
**Lokal:** `C:\Users\walter.uehli\bundu-relaunch`

---

## Tech Stack

| Komponente   | Version             |
|--------------|---------------------|
| Laravel      | 12.46.0             |
| Filament     | 3.3.46              |
| Livewire     | 3.7.3               |
| Tailwind CSS | v4                  |
| Vite         | Build-Tool          |
| PHP          | 8.3.29 (Produktion) |
| MariaDB      | 10.11               |

## Hosting

- **Hoster:** Hostpoint Shared Hosting
- **Server:** sl1185.web.hostpoint.ch
- **Webroot:** /www/bundu.ch/
- **PHP:** 8.3.29
- **DB:** MariaDB 10.11 (apamokus_bundudev26)
- **Deployment:** FTPS ZIP-Upload + \_deploy.php Helper
- **Credentials:** → ai-secrets.yaml (Hostpoint/bundu)

## Design Tokens

| Token         | Wert                |
|---------------|---------------------|
| Navy          | #0F2040             |
| Teal          | #079BB8             |
| Light         | #F5F6F8             |
| Ink           | #1A1A2E             |
| Font Headings | Bricolage Grotesque |
| Font Body     | Instrument Sans     |

## Architektur

### Models & Migrations (8)

- Angebot, Thema, Impuls, Download, Faq, Referenz, Team, SiteConfig

### Filament Resources (8)

- AngebotResource, ThemaResource, ImpulsResource, DownloadResource
- FaqResource, ReferenzResource, TeamResource, SiteConfigResource

### Frontend-Routen (19)

- Home, Über uns, Angebote (Index + Detail), Themen (Index + Detail)
- Impulse (Index + Detail), Downloads, FAQ, Referenzen
- Kontakt, Kursanmeldung, Impressum, Datenschutz, Team, Sitemap
- Alle Routen SEO-optimiert (Canonical, OG-Tags, JSON-LD)

### Blade Components

- layouts/app, section, hero, card, breadcrumb

### Livewire Components

- ContactForm, CourseRegistration

### Content (Seeder)

- 6 Angebote, 6 Themen, 3 Impulse, 5 Referenzen, 4 Downloads, 8 FAQs

## Git History

| Commit  | Phase   | Beschreibung                                                         |
|---------|---------|----------------------------------------------------------------------|
| 901e07c | Init    | Laravel 12 + Filament v3 Basis                                       |
| cc605ce | Fix     | Verschachteltes backend/ Duplikat entfernt                           |
| 81e57a9 | Phase 1 | Filament Resources, Migrationen, Models, Blade-Layout, Design-Tokens |
| f3e9491 | Phase 2 | Core-Seiten, Blade-Komponenten, Livewire Kontaktformular             |
| b9fc410 | Phase 3 | Dynamische Inhalte — Controller, Detail-Seiten, Kursanmeldung        |
| a003ecd | Phase 4 | Content-System — Dynamic Pages, SEO, Sitemap, Seeder                 |
| c463d3f | Bugfix  | Blade Component Resolution + JSON-LD @type Escaping                  |
| 085831e | Phase 5 | QA + Production Deployment auf Hostpoint                             |

### Phase 6: Post-Deployment (09.04.2026)

| Änderung | Dateien |
|----------|---------|
| Foto Walter Uehli eingefügt | homepage.blade.php, ueber-bundu.blade.php, public/images/walter-uehli.png |
| www→non-www Redirect | .htaccess.root |
| E-Mail-Versand (Kontaktformular) | KontaktFormular.php, ContactFormMail.php, contact-form.blade.php |
| GA4 Analytics (consent-gated) | components/layouts/app.blade.php |
| Cookie-Consent-Banner (Alpine.js) | components/layouts/app.blade.php |

## Phasen-Übersicht

### Phase 1: Admin-Backend

- 8 Eloquent Models mit Migrations
- 8 Filament Resources mit CRUD
- Blade-Layout mit Design-Tokens
- Admin unter /admin (Filament Panel)

### Phase 2: Core-Seiten

- Statische Seiten (Home, Über uns, Kontakt, Impressum, Datenschutz)
- 5 Blade-Komponenten (section, hero, card, breadcrumb, layouts/app)
- Livewire ContactForm mit Validierung

### Phase 3: Dynamische Inhalte

- Controller für Angebote, Themen, Impulse, Downloads, FAQ, Referenzen
- Detail-Seiten mit Slug-Routing
- Livewire CourseRegistration

### Phase 4: Content & SEO

- ContentSeeder mit 30+ Einträgen
- SEO: Meta-Tags, OG-Tags, JSON-LD Schema.org
- XML-Sitemap
- Breadcrumbs

### Phase 5: QA & Deployment

- 5 Bugs gefunden und behoben: 
  - section.blade.php: $title Prop Default null
  - Canonical-Tags: Auto-Generierung statt optional
  - Sitemap: XML-Declaration Fix (short_open_tag)
  - DatabaseSeeder: updateOrCreate statt Factory (Produktion)
- Vite Production Build (app.css 55.82KB, app.js 37.21KB)
- FTPS-Deployment auf Hostpoint
- 19/19 Routen OK, alle < 170ms Response Time

## Offene Punkte / Nächste Schritte

- [x] Admin-Passwort ändern
- [x] SSL-Zertifikat prüfen (Sectigo DV, gültig bis Jan 2027)
- [x] www→non-www Redirect (.htaccess.root)
- [x] E-Mail-Versand konfigurieren (SMTP Hostpoint, info@bundu.ch)
- [x] Analytics einbinden (GA4: G-G775R9XKMV, consent-gated)
- [x] Cookie-Consent-Banner (Alpine.js, DSGVO-konform)
- [ ] Echte Inhalte einpflegen (aktuell: Seeder-Daten)
- [ ] Backup-Strategie für DB definieren
- [ ] Newsletteranbindung
- [ ] Kontakte (Google Booking hinzufügen)
- [ ] Podcast auf Homepage verlinken