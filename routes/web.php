<?php

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
Route::view('/faq', 'pages.faq')->name('faq');

// Dynamische Inhalte — werden in Phase 2/3 mit Controllern verbunden
Route::view('/angebote', 'pages.angebote')->name('angebote');
Route::view('/themen', 'pages.themen')->name('themen');
Route::view('/impulse', 'pages.impulse')->name('impulse');
Route::view('/downloads', 'pages.downloads')->name('downloads');
Route::view('/referenzen', 'pages.referenzen')->name('referenzen');
