@php $d = $data; @endphp

<x-section
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    bgColor="bg-light"
>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($d['items'] as $val)
        <div class="bg-white rounded-xl p-8 shadow-sm">
            @if(!empty($val['icon']))
                <div class="w-12 h-12 bg-teal/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
            @endif
            <h3 class="font-heading text-lg font-bold text-navy mb-3">{{ $val['title'] ?? '' }}</h3>
            @if(!empty($val['description']))
                <p class="text-ink/70 text-sm">{{ $val['description'] }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
