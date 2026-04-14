@php
    $global = \App\Models\Global_::where('key', 'site')->first();
    $g = $global?->content ?? [];

    $siteName = $g['siteName'] ?? 'B&U BundU';
    $footerText = $g['footerText'] ?? '';
    $copyright = $g['copyright'] ?? ('© ' . date('Y') . ' ' . $siteName . '. Alle Rechte vorbehalten.');
    $logo = $g['assets']['logo'] ?? 'images/logo_2026K.png';

    $contact = $g['contact'] ?? [];
    $address = $contact['address'] ?? [];

    $footerLinks = $g['navigation']['footer'] ?? [];
    $legalLinks = $g['navigation']['legal'] ?? [
        ['name' => 'Impressum', 'href' => '/impressum'],
        ['name' => 'Datenschutz', 'href' => '/datenschutz'],
    ];

    $newsletterUrl = $g['externalLinks']['newsletterIframe'] ?? null;

    // Angebote aus DB laden
    $angebote = \App\Models\Angebot::where('aktiv', true)->orderBy('sortierung')->get();
@endphp

<footer class="bg-navy text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Spalte 1: Marke --}}
            <div class="md:col-span-1">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2">
                    <img src="{{ asset($logo) }}" alt="{{ $siteName }} Logo" class="h-10 w-auto">
                    <span class="font-heading text-xl font-bold">{{ $siteName }}</span>
                </a>
                @if($footerText)
                    <p class="mt-3 text-sm text-white/70">{{ $footerText }}</p>
                @endif
            </div>

            {{-- Spalte 2: Angebote (aus DB) --}}
            @if($angebote->count())
            <div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">Angebote</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    @foreach($angebote as $angebot)
                        <li><a href="{{ url('/angebote/' . $angebot->slug) }}" class="hover:text-teal transition-colors">{{ $angebot->titel }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Spalte 3: Quick-Links (aus Admin) --}}
            @if(!empty($footerLinks))
            <div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">Über B&U</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    @foreach($footerLinks as $link)
                        <li><a href="{{ url($link['href']) }}" class="hover:text-teal transition-colors">{{ $link['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Spalte 4: Kontakt (aus Admin) --}}
            <div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">Kontakt</h3>
                <address class="not-italic text-sm text-white/70 space-y-2">
                    @if(!empty($address['street']) || !empty($address['city']))
                        <p>
                            @if(!empty($address['street'])){{ $address['street'] }}<br>@endif
                            @if(!empty($address['city'])){{ $address['city'] }}@endif
                        </p>
                    @endif
                    @if(!empty($contact['phone']))
                        <p><a href="tel:{{ $contact['phoneClean'] ?? preg_replace('/[^+0-9]/', '', $contact['phone']) }}" class="hover:text-teal transition-colors">{{ $contact['phone'] }}</a></p>
                    @endif
                    @if(!empty($contact['email']))
                        <p><a href="mailto:{{ $contact['email'] }}" class="hover:text-teal transition-colors">{{ $contact['email'] }}</a></p>
                    @endif
                </address>
            </div>
        </div>

        {{-- Newsletter --}}
        @if($newsletterUrl)
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="max-w-2xl mx-auto text-center">
                <h3 class="font-heading text-lg font-bold mb-2">Newsletter</h3>
                <p class="text-white/70 text-sm mb-4">Impulse, Fachwissen und praktische Tipps – direkt in Ihr Postfach.</p>
                <iframe
                    src="{{ $newsletterUrl }}"
                    style="border: 0; width: 100%; height: 260px;"
                    frameborder="0"
                    loading="lazy"
                ></iframe>
            </div>
        </div>
        @endif

        {{-- Untere Leiste --}}
        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-white/50">
            <p>{!! str_contains($copyright, '©') ? $copyright : '© ' . date('Y') . ' ' . $copyright !!}</p>
            @if(!empty($legalLinks))
            <div class="flex gap-4">
                @foreach($legalLinks as $link)
                    <a href="{{ url($link['href']) }}" class="hover:text-white transition-colors">{{ $link['name'] }}</a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</footer>
