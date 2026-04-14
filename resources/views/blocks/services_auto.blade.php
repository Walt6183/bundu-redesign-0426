@php
    $d = $data;
    $limit = (int) ($d['limit'] ?? 3);
    $angebote = \App\Models\Angebot::where('aktiv', true)->orderBy('sortierung')->limit($limit)->get();
@endphp

<x-section
    :title="($d['title'] ?? 'Meine Angebote') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    :subtitle="$d['subtitle'] ?? null"
    bgColor="bg-light"
>
    @if($angebote->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-{{ min($angebote->count(), 3) }} gap-8">
        @foreach($angebote as $angebot)
        <a href="{{ route('angebote.show', $angebot->slug) }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
            <h3 class="font-heading text-lg font-bold text-navy mb-3 group-hover:text-teal transition-colors">{{ $angebot->titel }}</h3>
            <p class="text-ink/70 text-sm mb-4 line-clamp-3">{{ $angebot->kurzbeschreibung }}</p>
            <span class="text-teal font-medium text-sm">Mehr erfahren →</span>
        </a>
        @endforeach
    </div>
    @else
        <p class="text-center text-ink/50">Noch keine Angebote vorhanden.</p>
    @endif

    @if(!empty($d['ctaText']))
    <div class="text-center mt-10">
        <x-cta-button :text="$d['ctaText']" :url="$d['ctaUrl'] ?? '/angebote'" variant="secondary" />
    </div>
    @endif
</x-section>
