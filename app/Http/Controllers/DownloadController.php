<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(Request $request)
    {
        $query = Download::where('aktiv', true)->orderBy('titel');

        if ($kategorie = $request->query('kategorie')) {
            $query->where('kategorie', $kategorie);
        }

        if ($zielgruppe = $request->query('zielgruppe')) {
            $query->where('zielgruppe', $zielgruppe);
        }

        $downloads = $query->get();

        $kategorien = Download::where('aktiv', true)
            ->select('kategorie')
            ->distinct()
            ->pluck('kategorie')
            ->filter();

        return view('pages.downloads', compact('downloads', 'kategorien'));
    }
}
