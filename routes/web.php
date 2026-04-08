<?php

use Illuminate\Support\Facades\Route;

// Filament handles /admin routes automatically via its PanelProvider

// SPA catch-all: serve the React frontend for all non-API, non-admin routes
Route::get('/{any?}', function () {
    // In production, serve the built SPA view
    if (file_exists(public_path('build/.vite/manifest.json'))) {
        return view('spa');
    }
    // In development, redirect to Vite dev server
    return redirect('http://localhost:5173');
})->where('any', '^(?!api|admin|storage|livewire|sanctum|filament).*$');
