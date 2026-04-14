@php $d = $data; @endphp

<x-section
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    :subtitle="$d['subtitle'] ?? null"
    bgColor="bg-light"
>
    @if(!empty($d['cards']))
    <div class="grid grid-cols-1 md:grid-cols-{{ min(count($d['cards']), 3) }} gap-8">
        @foreach($d['cards'] as $card)
        <div class="bg-white rounded-xl p-8 shadow-sm">
            @if(!empty($card['icon']))
                <div class="w-12 h-12 bg-teal/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            @endif
            <h3 class="font-heading text-lg font-bold text-navy mb-3">{{ $card['title'] ?? '' }}</h3>
            @if(!empty($card['content']))
                <div class="prose prose-sm prose-navy max-w-none text-ink/70">{!! $card['content'] !!}</div>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
