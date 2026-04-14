<?php

use App\Http\Controllers\AngebotController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpulsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReferenzController;
use App\Http\Controllers\ThemaController;
use Illuminate\Support\Facades\Route;

// Filament handles /admin routes automatically via its PanelProvider

// ==========================================
// Frontend Routes (Blade + Livewire)
// ==========================================

Route::get('/', [PageController::class, 'home'])->name('home');

// Zielgruppen-Landingpages
Route::get('/fuer-eltern', fn () => app(HomeController::class)->zielgruppe('eltern'))->name('fuer-eltern');
Route::get('/fuer-fachpersonen', fn () => app(HomeController::class)->zielgruppe('fachpersonen'))->name('fuer-fachpersonen');
Route::get('/fuer-institutionen', fn () => app(HomeController::class)->zielgruppe('institutionen'))->name('fuer-institutionen');

// Statische Seiten → ab Phase 3 via PageController (CMS)
// Migriert: ueber-bundu, haltung-und-anspruch, walter-uehli, kontakt, impressum, datenschutz

// Redirect: Online-Kurse → CMS-Kursseite
Route::redirect('/angebote/online-kurse', '/courses', 301);

// Dynamische Inhalte (Controller mit Eloquent)
Route::get('/angebote', [AngebotController::class, 'index'])->name('angebote');
Route::get('/angebote/{slug}', [AngebotController::class, 'show'])->name('angebote.show');

Route::get('/themen', [ThemaController::class, 'index'])->name('themen');
Route::get('/themen/{slug}', [ThemaController::class, 'show'])->name('themen.show');

Route::get('/impulse', [ImpulsController::class, 'index'])->name('impulse');
Route::get('/impulse/{slug}', [ImpulsController::class, 'show'])->name('impulse.show');

Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads');
Route::get('/referenzen', [ReferenzController::class, 'index'])->name('referenzen');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// SEO
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// CMS Pages (Catch-All – muss am Ende stehen!)
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '[\w\-\/]+')->name('page.show');
