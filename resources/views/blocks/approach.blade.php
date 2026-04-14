@php $d = $data; @endphp

<x-section
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
>
    @if(!empty($d['description']))
        <p class="text-ink/70 max-w-3xl mx-auto text-center mb-12">{{ $d['description'] }}</p>
    @endif

    @if(!empty($d['categories']))
    <div class="grid grid-cols-1 md:grid-cols-{{ min(count($d['categories']), 3) }} gap-8">
        @foreach($d['categories'] as $cat)
        <div class="bg-light rounded-xl p-8">
            <h3 class="font-heading text-lg font-bold text-navy mb-4">{{ $cat['title'] ?? '' }}</h3>
            @if(!empty($cat['points']))
                <ul class="space-y-2">
                    @foreach($cat['points'] as $point)
                        <li class="flex items-start gap-2 text-ink/70 text-sm">
                            <svg class="w-4 h-4 text-teal shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ is_array($point) ? ($point['text'] ?? '') : $point }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
