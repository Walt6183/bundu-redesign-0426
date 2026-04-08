<?php

namespace App\Http\Controllers;

use App\Models\Impuls;
use Illuminate\Http\Request;

class ImpulsController extends Controller
{
    public function index(Request $request)
    {
        $query = Impuls::where('aktiv', true)->orderByDesc('datum');

        if ($kategorie = $request->query('kategorie')) {
            $query->where('kategorie', $kategorie);
        }

        if ($tag = $request->query('tag')) {
            $query->whereJsonContains('tags', $tag);
        }

        $impulse = $query->paginate(12);

        $kategorien = Impuls::where('aktiv', true)
            ->select('kategorie')
            ->distinct()
            ->pluck('kategorie')
            ->filter();

        return view('pages.impulse', compact('impulse', 'kategorien'));
    }

    public function show(string $slug)
    {
        $impuls = Impuls::where('slug', $slug)
            ->where('aktiv', true)
            ->firstOrFail();

        $weitere = Impuls::where('aktiv', true)
            ->where('id', '!=', $impuls->id)
            ->orderByDesc('datum')
            ->limit(3)
            ->get();

        return view('pages.impuls-detail', compact('impuls', 'weitere'));
    }
}
