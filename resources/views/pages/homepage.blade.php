<x-layouts.app
    :metaTitle="'Startseite'"
    :metaDescription="'B&U BundU – Systemische Beratung, Neue Autorität und Coaching für Eltern, Fachpersonen und Institutionen.'"
>
    {{-- 1. Hero --}}
    <x-hero
        title="Starke Beziehungen – starke Lösungen"
        subtitle="Systemische Beratung, Neue Autorität und Coaching – individuell, empathisch und lösungsorientiert."
        primaryCta="Kostenloses Erstgespräch anfragen"
        primaryCtaUrl="/kontakt"
        secondaryCta="Angebote entdecken"
        secondaryCtaUrl="/angebote"
    />

    {{-- 2. Zielgruppen-Kacheln --}}
    <x-section title="Für wen ich da bin" bgColor="bg-light">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'Für Eltern', 'icon' => '👨‍👩‍👧‍👦', 'desc' => 'Erziehungsthemen, Konflikte und Alltagshilfe – empathisch und praxisnah.', 'url' => '/fuer-eltern'],
                ['title' => 'Für Fachpersonen', 'icon' => '🎓', 'desc' => 'Weiterbildung, Supervision und Methoden – auf Augenhöhe und fachlich fundiert.', 'url' => '/fuer-fachpersonen'],
                ['title' => 'Für Institutionen', 'icon' => '🏢', 'desc' => 'Teambegleitung, Organisationsberatung und Inhouse-Fortbildungen.', 'url' => '/fuer-institutionen'],
            ] as $card)
                <a href="{{ url($card['url']) }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow text-center">
                    <span class="text-4xl mb-4 block">{{ $card['icon'] }}</span>
                    <h3 class="font-heading text-xl font-bold text-navy mb-3 group-hover:text-teal transition-colors">
                        {{ $card['title'] }}
                    </h3>
                    <p class="text-ink/70 mb-4">{{ $card['desc'] }}</p>
                    <span class="text-teal font-medium text-sm">Mehr erfahren →</span>
                </a>
            @endforeach
        </div>
    </x-section>

    {{-- 3. Problem-Nutzen-Bereich --}}
    <x-section title="Warum B&U BundU?" subtitle="Ich begleite dich mit praxisnahen Ansätzen – individuell, empathisch und lösungsorientiert.">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['icon' => '💛', 'title' => 'Empathische Begleitung', 'desc' => 'Ich verstehe deine Herausforderungen und begleite dich online mit Empathie und Professionalität.'],
                ['icon' => '👨‍👩‍👧', 'title' => 'Familienzentriert', 'desc' => 'Meine digitalen Ansätze stärken die gesamte Familie und fördern gesunde Beziehungen.'],
                ['icon' => '🛠️', 'title' => 'Praxisnah', 'desc' => 'Konkrete Strategien und Methoden, die sich im Alltag bewährt haben.'],
                ['icon' => '🌱', 'title' => 'Nachhaltig', 'desc' => 'Langfristige Lösungen, die Familien stärken und Wachstum ermöglichen.'],
            ] as $item)
                <div class="text-center">
                    <span class="text-3xl mb-3 block">{{ $item['icon'] }}</span>
                    <h3 class="font-heading text-lg font-bold text-navy mb-2">{{ $item['title'] }}</h3>
                    <p class="text-ink/70 text-sm">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- 4. Angebots-Übersicht --}}
    <x-section title="Meine Angebote" subtitle="Professionelle digitale Unterstützung für Familien, Schulen und Institutionen." bgColor="bg-light">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($angebote as $angebot)
                <a href="{{ route('angebote.show', $angebot->slug) }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-lg font-bold text-navy mb-3 group-hover:text-teal transition-colors">{{ $angebot->titel }}</h3>
                    <p class="text-ink/70 text-sm mb-4 line-clamp-3">{{ $angebot->kurzbeschreibung }}</p>
                    <span class="text-teal font-medium text-sm">Mehr erfahren →</span>
                </a>
            @empty
                @foreach([
                    ['title' => 'Online Beratung & Coaching', 'desc' => 'Individuelle Unterstützung für Eltern, Familien und Fachpersonen via coachingspace.'],
                    ['title' => 'Online Supervision', 'desc' => 'Professionelle digitale Begleitung für Teams und Institutionen.'],
                    ['title' => 'Webinare & Kurse', 'desc' => 'Praxisnahe Online-Weiterbildungen zu Neuer Autorität und Systemik.'],
                ] as $offer)
                    <div class="bg-white rounded-xl p-8 shadow-sm">
                        <h3 class="font-heading text-lg font-bold text-navy mb-3">{{ $offer['title'] }}</h3>
                        <p class="text-ink/70 text-sm">{{ $offer['desc'] }}</p>
                    </div>
                @endforeach
            @endforelse
        </div>
        <div class="text-center mt-10">
            <x-cta-button text="Alle Angebote ansehen" url="/angebote" variant="secondary" />
        </div>
    </x-section>

    {{-- 5. Themen-Hub --}}
    <x-section title="Aktuelle Themen" subtitle="Fachwissen und Orientierung zu den Herausforderungen, die dich beschäftigen.">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($themen as $thema)
                <a href="{{ route('themen.show', $thema->slug) }}" class="group flex items-start gap-3 p-4 rounded-lg hover:bg-light transition-colors">
                    <span class="text-teal mt-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    </span>
                    <div>
                        <h3 class="font-heading text-base font-bold text-navy group-hover:text-teal transition-colors">{{ $thema->titel }}</h3>
                        <p class="text-ink/60 text-sm">{{ Str::limit($thema->einleitung, 80) }}</p>
                    </div>
                </a>
            @empty
                @foreach([
                    ['title' => 'Neue Autorität', 'desc' => 'Beziehung statt Macht – der Ansatz für nachhaltige Erziehung.'],
                    ['title' => 'Systemische Beratung', 'desc' => 'Den Blick aufs ganze System richten – Lösungen im Kontext finden.'],
                    ['title' => 'Coaching für Eltern', 'desc' => 'Stärkung der eigenen Haltung und Handlungskompetenz.'],
                    ['title' => 'Teamentwicklung', 'desc' => 'Resiliente Teams durch professionelle Begleitung.'],
                    ['title' => 'Schutzkonzepte', 'desc' => 'Klare Strukturen zur Prävention von Grenzverletzungen.'],
                    ['title' => 'Supervision', 'desc' => 'Reflexion und Weiterentwicklung für Fachpersonen.'],
                ] as $t)
                    <div class="flex items-start gap-3 p-4 rounded-lg">
                        <span class="text-teal mt-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </span>
                        <div>
                            <h3 class="font-heading text-base font-bold text-navy">{{ $t['title'] }}</h3>
                            <p class="text-ink/60 text-sm">{{ $t['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        <div class="text-center mt-10">
            <x-cta-button text="Alle Themen entdecken" url="/themen" variant="ghost" />
        </div>
    </x-section>

    {{-- 6. Vertrauensbereich --}}
    <section class="py-16 lg:py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-6">Walter Uehli</h2>
                    <p class="text-ink/80 mb-4">
                        Mit über 20 Jahren Erfahrung in der stationären Kinder- und Jugendhilfe bringe ich fundiertes Praxiswissen mit.
                        In Schulheimen war ich zunächst als Pädagogischer Leiter und seit 2015 als Gesamtleiter tätig.
                    </p>
                    <p class="text-ink/80 mb-6">
                        Meine Arbeit basiert auf dem BundU-Prinzip – einem integrativen Ansatz, der bewährte Methoden der Neuen Autorität,
                        lösungsfokussierte Ansätze und systemische Gesprächsführung verbindet.
                    </p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        @foreach(['Dipl. Sozialpädagoge', 'Coach für Neue Autorität', 'SVEB I'] as $badge)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-teal/10 text-teal">{{ $badge }}</span>
                        @endforeach
                    </div>
                    <x-cta-button text="Mehr über mich" url="/ueber-bundu" variant="secondary" />
                </div>
                <div class="flex justify-center">
                    <div class="w-64 h-64 bg-navy/10 rounded-full flex items-center justify-center text-navy/30 text-6xl">
                        WU
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. Lead-Bereich / Blog-Teaser --}}
    <x-section title="Aktuelles aus dem Blog" subtitle="Impulse, Fachwissen und praktische Tipps für deinen Familienalltag.">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($impulse as $item)
                <a href="{{ route('impulse.show', $item->slug) }}" class="group bg-light rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                    @if($item->featured_image)
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $item->featured_image) }}')"></div>
                    @else
                        <div class="h-48 bg-navy/5 flex items-center justify-center text-ink/20">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-2">
                            @if($item->kategorie)
                                <span class="text-xs font-medium text-teal uppercase tracking-wider">{{ ucfirst(str_replace('-', ' ', $item->kategorie)) }}</span>
                            @endif
                            @if($item->datum)
                                <span class="text-xs text-ink/40">{{ $item->datum->format('d.m.Y') }}</span>
                            @endif
                        </div>
                        <h3 class="font-heading text-lg font-bold text-navy mt-1 mb-2 group-hover:text-teal transition-colors line-clamp-2">{{ $item->titel }}</h3>
                        @if($item->intro)
                            <p class="text-ink/60 text-sm line-clamp-2">{{ $item->intro }}</p>
                        @endif
                    </div>
                </a>
            @empty
                @for($i = 0; $i < 3; $i++)
                    <article class="bg-light rounded-xl overflow-hidden">
                        <div class="h-48 bg-navy/5 flex items-center justify-center text-ink/20">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-medium text-teal uppercase tracking-wider">Impulse</span>
                            <h3 class="font-heading text-lg font-bold text-navy mt-2 mb-2">Beitrag wird geladen…</h3>
                            <p class="text-ink/60 text-sm">Die aktuellsten Impulse erscheinen hier nach dem Go-Live.</p>
                        </div>
                    </article>
                @endfor
            @endforelse
        </div>
        <div class="text-center mt-10">
            <x-cta-button text="Alle Impulse ansehen" url="/impulse" variant="ghost" />
        </div>
    </x-section>

    {{-- 8. FAQ --}}
    <x-section title="Häufige Fragen" bgColor="bg-light">
        <div class="max-w-3xl mx-auto">
            @if($faqs->isNotEmpty())
                <x-faq-accordion :items="$faqs->map(fn ($f) => ['frage' => $f->frage, 'antwort' => $f->antwort])->toArray()" />
            @else
                <x-faq-accordion :items="[
                    ['frage' => 'Wie läuft ein Erstgespräch ab?', 'antwort' => 'Das Erstgespräch ist kostenlos und unverbindlich. Wir lernen uns kennen, klären dein Anliegen und schauen gemeinsam, welches Angebot am besten passt. Das Gespräch findet online via Videokonferenz statt und dauert ca. 30 Minuten.'],
                    ['frage' => 'Finden die Beratungen online statt?', 'antwort' => 'Ja, alle Beratungen, Coachings und Supervisionen finden online statt – bequem von zu Hause oder vom Arbeitsplatz aus. Ich nutze dafür die DSGVO-konforme Plattform coachingspace.de.'],
                    ['frage' => 'Was kostet eine Beratung?', 'antwort' => 'Die Kosten variieren je nach Angebot und Umfang. Einzelberatungen starten ab CHF 150 pro Stunde. Im kostenlosen Erstgespräch besprechen wir transparent die Konditionen für dein Anliegen.'],
                    ['frage' => 'Für wen sind die Angebote geeignet?', 'antwort' => 'Meine Angebote richten sich an Eltern, Fachpersonen im pädagogischen Bereich und Institutionen in der Deutschschweiz.'],
                    ['frage' => 'Was ist Neue Autorität?', 'antwort' => 'Neue Autorität ist ein Konzept von Haim Omer, das auf Präsenz, Beharrlichkeit und gewaltlosem Widerstand basiert.'],
                ]" />
            @endif
        </div>
    </x-section>

    {{-- 9. Abschluss-CTA --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">Bereit für den nächsten Schritt?</h2>
            <p class="text-white/80 mb-8">
                Lass uns gemeinsam Lösungen finden. Buche jetzt dein kostenloses, unverbindliches Online-Erstgespräch.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/kontakt') }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                    Erstgespräch buchen
                </a>
                <a href="{{ url('/downloads') }}" class="inline-flex items-center justify-center px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                    Kostenlose Ressourcen
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
