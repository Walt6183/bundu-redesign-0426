@php $d = $data; @endphp

<x-section
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    :subtitle="$d['subtitle'] ?? null"
    bgColor="bg-light"
>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($d['items'] as $item)
        <div class="bg-white rounded-xl p-8 shadow-sm">
            @if(!empty($item['icon']))
                <div class="w-12 h-12 bg-teal/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            @endif
            <h3 class="font-heading text-lg font-bold text-navy mb-3">{{ $item['title'] ?? '' }}</h3>
            @if(!empty($item['description']))
                <p class="text-ink/70 text-sm">{{ $item['description'] }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
