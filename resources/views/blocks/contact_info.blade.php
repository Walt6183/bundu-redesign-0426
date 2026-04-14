@php $d = $data; @endphp

<x-section>
    @if(!empty($d['title']))
        <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-4 text-center">{{ $d['title'] }}</h2>
    @endif
    @if(!empty($d['description']))
        <p class="text-ink/70 text-center max-w-2xl mx-auto mb-10">{{ $d['description'] }}</p>
    @endif

    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
        @foreach($d['items'] as $info)
        <div class="bg-light rounded-xl p-8 text-center">
            @if(!empty($info['icon']))
                <div class="w-12 h-12 bg-teal/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            @endif
            <h3 class="font-heading font-bold text-navy mb-2">{{ $info['title'] ?? '' }}</h3>
            @if(!empty($info['content']))
                <p class="text-ink/70 text-sm">{!! $info['content'] !!}</p>
            @endif
            @if(!empty($info['action']))
                <a href="{{ $info['action'] }}" class="inline-block mt-3 text-teal text-sm font-medium">Kontakt →</a>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
