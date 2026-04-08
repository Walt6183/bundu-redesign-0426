<?php

namespace App\Http\Controllers;

use App\Models\Angebot;
use App\Models\Impuls;
use App\Models\Thema;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $angebote = Angebot::where('aktiv', true)->select('slug', 'updated_at')->get();
        $themen = Thema::where('aktiv', true)->select('slug', 'updated_at')->get();
        $impulse = Impuls::where('aktiv', true)->select('slug', 'updated_at')->get();

        $content = view('sitemap', compact('angebote', 'themen', 'impulse'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
