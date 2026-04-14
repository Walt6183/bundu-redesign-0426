@php $d = $data; @endphp

<x-section
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
    :subtitle="$d['subtitle'] ?? null"
>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        @foreach($d['items'] as $kurs)
        <div class="bg-light rounded-xl p-8 {{ !empty($kurs['isFullyBooked']) ? 'opacity-60' : '' }}">
            <h3 class="font-heading text-xl font-bold text-navy mb-3">{{ $kurs['title'] ?? '' }}</h3>
            @if(!empty($kurs['description']))
                <p class="text-ink/70 text-sm mb-4">{{ $kurs['description'] }}</p>
            @endif
            <div class="space-y-1 text-sm text-ink/60 mb-4">
                @if(!empty($kurs['duration'])) <p>⏱ {{ $kurs['duration'] }}</p> @endif
                @if(!empty($kurs['location'])) <p>📍 {{ $kurs['location'] }}</p> @endif
                @if(!empty($kurs['maxParticipants'])) <p>👥 Max. {{ $kurs['maxParticipants'] }} Teilnehmer</p> @endif
                @if(!empty($kurs['price'])) <p class="font-medium text-navy">{{ $kurs['price'] }}</p> @endif
            </div>
            @if(!empty($kurs['isFullyBooked']))
                <span class="inline-flex px-4 py-2 bg-red-100 text-red-600 rounded-lg text-sm font-medium">Ausgebucht</span>
            @elseif(!empty($kurs['bookingUrl']))
                <a href="{{ $kurs['bookingUrl'] }}" @if(!empty($kurs['isExternal'])) target="_blank" rel="noopener" @endif class="inline-flex px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                    {{ $kurs['infoText'] ?? 'Jetzt anmelden' }}
                </a>
            @endif
        </div>
        @endforeach
    </div>
    @endif

    @if(!empty($d['testimonials']))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        @foreach($d['testimonials'] as $t)
            <x-testimonial-card :zitat="$t['quote']" :name="$t['author']" :organisation="$t['role'] ?? null" />
        @endforeach
    </div>
    @endif

    @if(!empty($d['benefits']))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($d['benefits'] as $b)
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
