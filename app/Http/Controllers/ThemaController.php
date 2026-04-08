<?php

namespace App\Http\Controllers;

use App\Models\Thema;
use Illuminate\Http\Request;

class ThemaController extends Controller
{
    public function index(Request $request)
    {
        $query = Thema::where('aktiv', true)->orderBy('titel');

        if ($zielgruppe = $request->query('zielgruppe')) {
            $query->whereJsonContains('zielgruppen', $zielgruppe);
        }

        $themen = $query->get();

        return view('pages.themen', compact('themen'));
    }

    public function show(string $slug)
    {
        $thema = Thema::where('slug', $slug)
            ->where('aktiv', true)
            ->with(['angebote' => fn ($q) => $q->where('aktiv', true), 'faqs' => fn ($q) => $q->where('aktiv', true)->orderBy('sortierung')])
            ->firstOrFail();

        return view('pages.thema-detail', compact('thema'));
    }
}
