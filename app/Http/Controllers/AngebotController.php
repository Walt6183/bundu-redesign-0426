<?php

namespace App\Http\Controllers;

use App\Models\Angebot;
use Illuminate\Http\Request;

class AngebotController extends Controller
{
    public function index(Request $request)
    {
        $query = Angebot::where('aktiv', true)->orderBy('sortierung');

        if ($zielgruppe = $request->query('zielgruppe')) {
            $query->whereJsonContains('zielgruppe', $zielgruppe);
        }

        $angebote = $query->get();

        return view('pages.angebote', compact('angebote'));
    }

    public function show(string $slug)
    {
        $angebot = Angebot::where('slug', $slug)
            ->where('aktiv', true)
            ->with('themen')
            ->firstOrFail();

        $verwandte = Angebot::where('aktiv', true)
            ->where('id', '!=', $angebot->id)
            ->limit(3)
            ->get();

        return view('pages.angebot-detail', compact('angebot', 'verwandte'));
    }
}
