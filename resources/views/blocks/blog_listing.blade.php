@php
    $d = $data;
    $limit = (int) ($d['limit'] ?? 3);
    $impulse = \App\Models\Impuls::where('aktiv', true)->orderByDesc('datum')->limit($limit)->get();
@endphp

<x-section
    :title="($d['title'] ?? 'Impulse') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    :subtitle="$d['subtitle'] ?? null"
    bgColor="bg-light"
>
    @if($impulse->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-{{ min($impulse->count(), 3) }} gap-8">
        @foreach($impulse as $item)
        <a href="{{ route('impulse.show', $item->slug) }}" class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
            @if($item->bild)
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset($item->bild) }}')"></div>
            @endif
            <div class="p-6">
                <p class="text-xs text-ink/50 mb-2">{{ $item->datum?->format('d.m.Y') }}</p>
                <h3 class="font-heading text-lg font-bold text-navy mb-2 group-hover:text-teal transition-colors">{{ $item->titel }}</h3>
                <p class="text-ink/70 text-sm line-clamp-3">{{ $item->vorschau ?? Str::limit(strip_tags($item->inhalt), 120) }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @else
        <p class="text-center text-ink/50">Noch keine Impulse vorhanden.</p>
    @endif
</x-section>
