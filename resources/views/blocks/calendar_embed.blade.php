@php
    $d = $data;
    $bookingUrl = $d['calendarEmbedUrl'] ?? null;
    if (!$bookingUrl) {
        $bookingUrl = \App\Models\Global_::where('key', 'site')->first()?->content['externalLinks']['bookingIframe'] ?? null;
    }
@endphp

<x-section>
    <div class="max-w-4xl mx-auto">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-8 text-center">{{ $d['title'] }}</h2>
        @endif

        <div class="text-center py-12 bg-light rounded-xl">
            @if($bookingUrl)
                <p class="text-ink/70 mb-6">{{ $d['subtitle'] ?? 'Buchen Sie jetzt Ihr kostenloses Erstgespräch – direkt und unkompliziert.' }}</p>
                <a href="{{ $bookingUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-teal text-white font-semibold rounded-lg hover:bg-teal/90 transition-colors text-lg">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $d['fallbackButtonText'] ?? 'Termin direkt buchen' }}
                </a>
            @else
                <p class="text-ink/60 mb-4">{{ $d['fallbackText'] ?? 'Terminbuchung ist derzeit nicht verfügbar.' }}</p>
                @if(!empty($d['fallbackUrl']))
                    <a href="{{ $d['fallbackUrl'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                        {{ $d['fallbackButtonText'] ?? 'Termin direkt buchen' }}
                    </a>
                @endif
            @endif
        </div>
    </div>
</x-section>