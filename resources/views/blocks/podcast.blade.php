@php
    $d = $data;
    $embedCode = $d['embedCode'] ?? null;
    // Auto-fetch from Global_ settings if not provided
    if (!$embedCode) {
        $global = \App\Models\Global_::where('key', 'site')->first();
        $script = $global?->content['externalLinks']['podcastScript'] ?? null;
        if ($script) {
            $embedCode = str_replace('/player.js', '/iframe-player', $script);
        }
    }
@endphp

<x-section bgColor="bg-light">
    <div class="max-w-3xl mx-auto text-center">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-4">{{ $d['title'] }}</h2>
        @endif
        @if(!empty($d['description']))
            <p class="text-ink/70 mb-8">{{ $d['description'] }}</p>
        @endif
        @if($embedCode)
            <div class="rounded-xl overflow-hidden shadow-sm">
                <iframe
                    src="{{ $embedCode }}?size=m-alternative"
                    style="border: 0; width: 100%; height: 200px;"
                    frameborder="0"
                    loading="lazy"
                ></iframe>
            </div>
        @endif
    </div>
</x-section>
