<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('aktiv', true)
            ->orderBy('sortierung')
            ->get();

        $gruppierteFaqs = $faqs->groupBy('zielgruppe');

        return view('pages.faq', compact('faqs', 'gruppierteFaqs'));
    }
}
