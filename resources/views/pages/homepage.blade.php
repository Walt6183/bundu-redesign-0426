<x-layouts.app
    :metaTitle="'Startseite'"
    :metaDescription="'B&U BundU – Systemische Beratung, Neue Autorität und Coaching für Eltern, Fachpersonen und Institutionen.'"
>
    {{-- Hero --}}
    <section class="bg-navy text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-heading text-4xl lg:text-6xl font-bold mb-6">
                Starke Beziehungen –<br>starke Lösungen
            </h1>
            <p class="text-lg lg:text-xl text-white/80 max-w-2xl mx-auto mb-8">
                Systemische Beratung, Neue Autorität und Coaching – individuell, empathisch und lösungsorientiert.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/kontakt') }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                    Kostenloses Erstgespräch anfragen
                </a>
                <a href="{{ url('/angebote') }}" class="inline-flex items-center justify-center px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                    Angebote entdecken
                </a>
            </div>
        </div>
    </section>

    {{-- Zielgruppen-Kacheln --}}
    <section class="py-16 lg:py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy text-center mb-12">
                Für wen ich da bin
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['title' => 'Für Eltern', 'desc' => 'Erziehungsthemen, Konflikte und Alltagshilfe – empathisch und praxisnah.', 'url' => '/fuer-eltern', 'cta' => 'Mehr erfahren'],
                    ['title' => 'Für Fachpersonen', 'desc' => 'Weiterbildung, Supervision und Methoden – auf Augenhöhe und fachlich fundiert.', 'url' => '/fuer-fachpersonen', 'cta' => 'Mehr erfahren'],
                    ['title' => 'Für Institutionen', 'desc' => 'Teambegleitung, Organisationsberatung und Inhouse-Fortbildungen.', 'url' => '/fuer-institutionen', 'cta' => 'Mehr erfahren'],
                ] as $card)
                    <a href="{{ url($card['url']) }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="font-heading text-xl font-bold text-navy mb-3 group-hover:text-teal transition-colors">
                            {{ $card['title'] }}
                        </h3>
                        <p class="text-ink/70 mb-4">{{ $card['desc'] }}</p>
                        <span class="text-teal font-medium text-sm">{{ $card['cta'] }} →</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Platzhalter für weitere Module (Phase 2) --}}

</x-layouts.app>
