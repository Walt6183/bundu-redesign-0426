@php
    $d = $data;
    // Auto-fetch calendar URL from Global_ settings if not provided
    $calendarUrl = $d['calendarEmbedUrl'] ?? null;
    if (!$calendarUrl) {
        $calendarUrl = \App\Models\Global_::where('key', 'site')->first()?->content['externalLinks']['bookingIframe'] ?? null;
    }
@endphp

<x-section>
    <div class="max-w-4xl mx-auto">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-8 text-center">{{ $d['title'] }}</h2>
        @endif
        @if($calendarUrl)
            <div class="rounded-xl overflow-hidden shadow-sm bg-white" style="min-height: 600px;">
                <iframe
                    src="{{ $calendarUrl }}"
                    style="border: 0; width: 100%; height: 680px;"
                    frameborder="0"
                    loading="lazy"
                ></iframe>
            </div>
        @else
            <div class="text-center py-12 bg-light rounded-xl">
                <p class="text-ink/60 mb-4">{{ $d['fallbackText'] ?? 'Terminbuchung ist derzeit nicht verfügbar.' }}</p>
                @if(!empty($d['fallbackUrl']))
                    <a href="{{ $d['fallbackUrl'] }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                        {{ $d['fallbackButtonText'] ?? 'Termin direkt buchen' }}
                    </a>
                @endif
            </div>
        @endif
    </div>
</x-section>
