@php $d = $data; @endphp

<x-section
    :title="$d['title'] ?? null"
    :subtitle="$d['subtitle'] ?? null"
>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($d['items'] as $b)
        <div class="text-center">
            <div class="w-12 h-12 bg-teal/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h4 class="font-heading font-bold text-navy mb-1">{{ $b['title'] ?? '' }}</h4>
            @if(!empty($b['description']))
                <p class="text-ink/70 text-sm">{{ $b['description'] }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
