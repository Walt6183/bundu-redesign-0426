@php
    $d = $data;
    $limit = (int) ($d['limit'] ?? 6);
    $themen = \App\Models\Thema::where('aktiv', true)->orderBy('titel')->limit($limit)->get();
@endphp

<x-section
    :title="($d['title'] ?? 'Aktuelle Themen') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    :subtitle="$d['subtitle'] ?? null"
>
    @if($themen->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($themen as $thema)
        <a href="{{ route('themen.show', $thema->slug) }}" class="group flex items-start gap-3 p-4 rounded-lg hover:bg-light transition-colors">
            <span class="text-teal mt-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </span>
            <div>
                <h3 class="font-heading text-base font-bold text-navy group-hover:text-teal transition-colors">{{ $thema->titel }}</h3>
                <p class="text-ink/60 text-sm">{{ Str::limit($thema->einleitung, 80) }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @else
        <p class="text-center text-ink/50">Noch keine Themen vorhanden.</p>
    @endif

    @if(!empty($d['ctaText']))
    <div class="text-center mt-10">
        <x-cta-button :text="$d['ctaText']" :url="$d['ctaUrl'] ?? '/themen'" variant="ghost" />
    </div>
    @endif
</x-section>
