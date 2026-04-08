<?php

namespace App\Http\Controllers;

use App\Models\Referenz;

class ReferenzController extends Controller
{
    public function index()
    {
        $referenzen = Referenz::where('aktiv', true)
            ->orderBy('sortierung')
            ->get();

        return view('pages.referenzen', compact('referenzen'));
    }
}
