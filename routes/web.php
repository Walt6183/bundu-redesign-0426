<?php

use App\Http\Controllers\AngebotController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ImpulsController;
use App\Http\Controllers\ReferenzController;
use App\Http\Controllers\ThemaController;
use Illuminate\Support\Facades\Route;

// Filament handles /admin routes automatically via its PanelProvider

// ==========================================
// Frontend Routes (Blade + Livewire)
// ==========================================

Route::get('/', function () {
    return view('pages.homepage');
})->name('home');

// Zielgruppen-Landingpages
Route::get('/fuer-eltern', function () {
    return view('pages.zielgruppe', ['zielgruppe' => 'eltern']);
})->name('fuer-eltern');

Route::get('/fuer-fachpersonen', function () {
    return view('pages.zielgruppe', ['zielgruppe' => 'fachpersonen']);
})->name('fuer-fachpersonen');

Route::get('/fuer-institutionen', function () {
    return view('pages.zielgruppe', ['zielgruppe' => 'institutionen']);
})->name('fuer-institutionen');

// Statische Seiten
Route::view('/ueber-bundu', 'pages.ueber-bundu')->name('ueber-bundu');
Route::view('/kontakt', 'pages.kontakt')->name('kontakt');
Route::view('/impressum', 'pages.impressum')->name('impressum');
Route::view('/datenschutz', 'pages.datenschutz')->name('datenschutz');

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
