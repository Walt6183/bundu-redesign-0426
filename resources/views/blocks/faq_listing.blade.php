@php
    $d = $data;
    $limit = (int) ($d['limit'] ?? 5);
    $zielgruppe = $d['zielgruppe'] ?? 'alle';
    $faqs = \App\Models\Faq::where('aktiv', true)
        ->where('zielgruppe', $zielgruppe)
        ->orderBy('sortierung')
        ->limit($limit)
        ->get();
@endphp

<x-section
    :title="($d['title'] ?? 'Häufige Fragen') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    bgColor="bg-light"
>
    <div class="max-w-3xl mx-auto">
        @if($faqs->isNotEmpty())
            <x-faq-accordion :items="$faqs->map(fn ($f) => ['frage' => $f->frage, 'antwort' => $f->antwort])->toArray()" />
        @else
            <p class="text-center text-ink/50">Noch keine FAQs vorhanden.</p>
        @endif
    </div>
</x-section>
