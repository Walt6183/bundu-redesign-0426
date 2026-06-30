# BundU Redesign

Website-Redesign fuer **B&U BundU** -- gebaut mit Laravel 12, Filament 3, Livewire 3 und Tailwind CSS v4.

**Live:** https://bundu.ch

---

## Tech Stack

| Komponente | Version |
|---|---|
| Laravel | 12.46.0 |
| Filament | 3.3.46 (Admin-Panel) |
| Livewire | 3.7.3 |
| Tailwind CSS | v4 |
| PHP | 8.3+ |

## Features

- 8 Filament Resources -- Angebote, Themen, Impulse, Downloads, FAQs, Referenzen, Team, Site-Config
- 19 Frontend-Routen -- Alle mit SEO (Canonical, OG-Tags, JSON-LD Schema.org)
- Livewire-Formulare -- Kontaktformular + Kursanmeldung mit Validierung
- XML-Sitemap -- Automatisch generiert
- Responsive Design -- Bricolage Grotesque + Instrument Sans, Navy/Teal Farbschema

## Design Tokens

| Token | Wert |
|---|---|
| Navy | #0F2040 |
| Teal | #079BB8 |
| Light | #F5F6F8 |
| Ink | #1A1A2E |

## Deployment

Gehostet auf **Hostpoint Shared Hosting** (PHP 8.3, MariaDB 10.11).

## Aenderungshistorie

| Datum | Commit | Beschreibung |
|---|---|---|
| 2026-04 | 901e07c | Initial: Laravel 12 + Filament v3 Basis |
| 2026-04 | 81e57a9 | Phase 1: Filament Resources, Migrationen, Models, Layout |
| 2026-04 | f3e9491 | Phase 2: Core-Seiten, Blade-Komponenten, Livewire |
| 2026-04 | b9fc410 | Phase 3: Dynamische Inhalte, Controller, Detail-Seiten |
| 2026-04 | a003ecd | Phase 4: Content-System, SEO, Sitemap, Seeder |
| 2026-05 | 085831e | Phase 5: QA + Production Deployment |
| 2026-06-30 | 17215ea | Kontakt: Google-Kalender entfernt, Microsoft Bookings Button eingebaut (oeffnet in neuem Fenster) |
| 2026-06-30 | 1039b1a | Fix: bookingUrl statt bookingIframe korrigiert |

## Copyright

2026 B&U BundU. Alle Rechte vorbehalten.