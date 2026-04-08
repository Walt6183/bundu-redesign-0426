<x-layouts.app
    :metaTitle="'Angebote'"
    :metaDescription="'Online-Beratung, Coaching, Supervision und Kurse – alle Angebote von B&U BundU im Überblick.'"
>
    <x-hero
        title="Angebote"
        subtitle="Professionelle digitale Unterstützung für Familien, Fachpersonen und Institutionen."
        primaryCta="Kostenloses Erstgespräch"
        primaryCtaUrl="/kontakt"
    />

    {{-- Zielgruppen-Filter --}}
    <section class="py-8 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('angebote') }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('zielgruppe') ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                    Alle
                </a>
                @foreach(['eltern' => 'Für Eltern', 'fachpersonen' => 'Für Fachpersonen', 'institutionen' => 'Für Institutionen'] as $key => $label)
                    <a href="{{ route('angebote', ['zielgruppe' => $key]) }}"
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('zielgruppe') === $key ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Angebote-Liste --}}
    <x-section>
        @if($angebote->isEmpty())
            <div class="text-center py-12">
                <p class="text-ink/50 text-lg">Noch keine Angebote vorhanden. Diese werden nach dem Go-Live hier angezeigt.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($angebote as $angebot)
                    <a href="{{ route('angebote.show', $angebot->slug) }}" class="group bg-light rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                        @if($angebot->featured_image)
                            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $angebot->featured_image) }}')"></div>
                        @else
                            <div class="h-48 bg-navy/5 flex items-center justify-center text-navy/20">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/></svg>
                            </div>
                        @endif
                        <div class="p-6">
                            @if($angebot->zielgruppe)
                                <div class="flex flex-wrap gap-1 mb-2">
                                    @foreach($angebot->zielgruppe as $zg)
                                        <span class="text-xs font-medium text-teal uppercase tracking-wider">{{ ucfirst($zg) }}</span>
                                        @if(!$loop->last) <span class="text-xs text-ink/30">·</span> @endif
                                    @endforeach
                                </div>
                            @endif
                            <h3 class="font-heading text-lg font-bold text-navy mb-2 group-hover:text-teal transition-colors">{{ $angebot->titel }}</h3>
                            <p class="text-ink/70 text-sm line-clamp-3">{{ $angebot->kurzbeschreibung }}</p>
                            <span class="inline-block mt-4 text-teal font-medium text-sm">Details ansehen →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </x-section>

    {{-- CTA --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">Kein passendes Angebot gefunden?</h2>
            <p class="text-white/80 mb-8">Kontaktieren Sie mich – gemeinsam finden wir die passende Lösung für Ihr Anliegen.</p>
            <a href="{{ url('/kontakt') }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                Kostenloses Erstgespräch buchen
            </a>
        </div>
    </section>

</x-layouts.app>
