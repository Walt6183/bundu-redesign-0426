<?php

namespace App\Http\Controllers;

use App\Models\Angebot;
use App\Models\Faq;
use App\Models\Impuls;
use App\Models\Referenz;
use App\Models\Thema;

class HomeController extends Controller
{
    public function index()
    {
        $angebote = Angebot::where('aktiv', true)
            ->orderBy('sortierung')
            ->limit(3)
            ->get();

        $themen = Thema::where('aktiv', true)
            ->orderBy('titel')
            ->limit(6)
            ->get();

        $impulse = Impuls::where('aktiv', true)
            ->orderByDesc('datum')
            ->limit(3)
            ->get();

        $referenzen = Referenz::where('aktiv', true)
            ->orderBy('sortierung')
            ->limit(3)
            ->get();

        $faqs = Faq::where('aktiv', true)
            ->where('zielgruppe', 'alle')
            ->orderBy('sortierung')
            ->limit(5)
            ->get();

        return view('pages.homepage', compact('angebote', 'themen', 'impulse', 'referenzen', 'faqs'));
    }

    public function zielgruppe(string $zielgruppe)
    {
        $angebote = Angebot::where('aktiv', true)
            ->whereJsonContains('zielgruppe', $zielgruppe)
            ->orderBy('sortierung')
            ->limit(3)
            ->get();

        $themen = Thema::where('aktiv', true)
            ->whereJsonContains('zielgruppen', $zielgruppe)
            ->orderBy('titel')
            ->limit(5)
            ->get();

        $referenzen = Referenz::where('aktiv', true)
            ->where('zielgruppe', $zielgruppe)
            ->orderBy('sortierung')
            ->limit(3)
            ->get();

        $faqs = Faq::where('aktiv', true)
            ->whereIn('zielgruppe', [$zielgruppe, 'alle'])
            ->orderBy('sortierung')
            ->limit(5)
            ->get();

        return view('pages.zielgruppe', compact('zielgruppe', 'angebote', 'themen', 'referenzen', 'faqs'));
    }
}
