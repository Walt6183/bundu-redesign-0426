@php
    $data = match($zielgruppe) {
        'eltern' => [
            'title' => 'Starke Eltern – starke Kinder',
            'subtitle' => 'Erziehung mit Haltung statt Härte. Ich berate dich professionell und ortsunabhängig per Video-Call.',
            'metaTitle' => 'Für Eltern',
            'metaDescription' => 'Systemische Beratung und Coaching für Eltern – empathisch, praxisnah und online. Kostenloses Erstgespräch.',
            'primaryCta' => 'Kostenloses Erstgespräch anfragen',
            'primaryCtaUrl' => '/kontakt',
            'secondaryCta' => 'Passenden Kurs finden',
            'secondaryCtaUrl' => '/angebote',
            'situationen' => [
                ['icon' => '😤', 'title' => 'Konflikte eskalieren', 'desc' => 'Du stehst immer wieder vor Machtkämpfen und weisst nicht, wie du reagieren sollst.'],
                ['icon' => '😰', 'title' => 'Unsicherheit in der Erziehung', 'desc' => 'Du fragst dich, ob du das Richtige tust – und wünschst dir Orientierung.'],
                ['icon' => '💬', 'title' => 'Kommunikation stockt', 'desc' => 'Die Gespräche mit deinem Kind enden oft in Streit oder Schweigen.'],
            ],
            'angebote' => [
                ['title' => 'Online Beratung & Coaching', 'desc' => 'Individuelle Unterstützung bei Erziehungsfragen – per Videokonferenz.', 'url' => '/angebote'],
                ['title' => 'Online-Kurse', 'desc' => 'Praxisnahe Kurse zu Neuer Autorität und lösungsorientierter Erziehung.', 'url' => '/angebote'],
                ['title' => 'Kostenlose Ressourcen', 'desc' => 'Checklisten, Leitfäden und Arbeitsblätter zum Download.', 'url' => '/downloads'],
            ],
            'themen' => ['Neue Autorität', 'Eltern-Kind-Kommunikation', 'Grenzen setzen mit Haltung', 'Geschwisterkonflikte', 'Pubertät & Autonomie'],
            'testimonials' => [
                ['zitat' => 'Endlich fühle ich mich sicher in schwierigen Situationen. Die Beratung hat unsere ganze Familie verändert.', 'name' => 'Sarah M.', 'organisation' => 'Mutter von 3 Kindern'],
            ],
        ],
        'fachpersonen' => [
            'title' => 'Fachlich stark – methodisch sicher',
            'subtitle' => 'Weiterbildung, Supervision und Methoden für Fachpersonen im pädagogischen Bereich.',
            'metaTitle' => 'Für Fachpersonen',
            'metaDescription' => 'Supervision, Weiterbildung und Coaching für Fachpersonen – online und praxisnah.',
            'primaryCta' => 'Workshop anfragen',
            'primaryCtaUrl' => '/kontakt',
            'secondaryCta' => 'Alle Angebote ansehen',
            'secondaryCtaUrl' => '/angebote',
            'situationen' => [
                ['icon' => '🔄', 'title' => 'Herausfordernde Situationen', 'desc' => 'Du brauchst Reflexion und methodische Sicherheit für komplexe Fälle.'],
                ['icon' => '📚', 'title' => 'Fachliche Weiterentwicklung', 'desc' => 'Du willst dein Repertoire erweitern – praxisnah und fundiert.'],
                ['icon' => '🤝', 'title' => 'Kollegiale Unterstützung', 'desc' => 'Du wünschst dir professionelle Begleitung auf Augenhöhe.'],
            ],
            'angebote' => [
                ['title' => 'Online Supervision', 'desc' => 'Professionelle Fallbesprechung und Reflexion – digital und flexibel.', 'url' => '/angebote'],
                ['title' => 'Webinare & Workshops', 'desc' => 'Praxisnahe Weiterbildungen zu Neuer Autorität und Systemik.', 'url' => '/angebote'],
                ['title' => 'Einzelcoaching', 'desc' => 'Individuelle Begleitung für deine berufliche Entwicklung.', 'url' => '/angebote'],
            ],
            'themen' => ['Supervision', 'Neue Autorität im Berufsalltag', 'Systemische Gesprächsführung', 'Umgang mit Widerstand', 'Burnout-Prävention'],
            'testimonials' => [
                ['zitat' => 'Die Supervision mit Walter hat mir neue Perspektiven eröffnet und meine Arbeit mit den Jugendlichen deutlich verbessert.', 'name' => 'Thomas K.', 'organisation' => 'Sozialpädagoge'],
            ],
        ],
        'institutionen' => [
            'title' => 'Mehr Sicherheit, stärkere Teams',
            'subtitle' => 'Weiterbildungsangebote für Institutionen in der Deutschschweiz. Systemische Beratung, Teamentwicklung und der Bündner Standard.',
            'metaTitle' => 'Für Institutionen',
            'metaDescription' => 'Systemische Beratung, Teamentwicklung und Bündner Standard für Institutionen in der Deutschschweiz.',
            'primaryCta' => 'Unverbindliche Anfrage stellen',
            'primaryCtaUrl' => '/kontakt',
            'secondaryCta' => 'Referenzen ansehen',
            'secondaryCtaUrl' => '/referenzen',
            'situationen' => [
                ['icon' => '👥', 'title' => 'Fachkräftemangel', 'desc' => 'Teams sind überlastet und brauchen professionelle Unterstützung und Entlastung.'],
                ['icon' => '🛡️', 'title' => 'Schutzkonzepte', 'desc' => 'Ihre Institution benötigt klare Strukturen zur Prävention von Grenzverletzungen.'],
                ['icon' => '💬', 'title' => 'Kommunikation', 'desc' => 'Schwierige Gespräche erfordern fundierte Methoden und Handlungssicherheit.'],
            ],
            'angebote' => [
                ['title' => 'Inhouse-Fortbildungen', 'desc' => 'Massgeschneiderte Weiterbildungen für Ihr gesamtes Team.', 'url' => '/angebote'],
                ['title' => 'Teamentwicklung', 'desc' => 'Resiliente Teams durch professionelle systemische Begleitung.', 'url' => '/angebote'],
                ['title' => 'Bündner Standard', 'desc' => 'Zertifizierte Implementierung für ein sicheres Umfeld.', 'url' => '/angebote'],
            ],
            'themen' => ['Bündner Standard', 'Teamentwicklung', 'Schutzkonzepte', 'Neue Autorität in Institutionen', 'Organisationsberatung'],
            'testimonials' => [
                ['zitat' => 'Die Zusammenarbeit mit Walter hat unser Team nachhaltig gestärkt. Die Methoden sind praxisnah und sofort umsetzbar.', 'name' => 'Andrea B.', 'organisation' => 'Leiterin Kinder- und Jugendheim'],
            ],
        ],
    };
@endphp

<x-layouts.app
    :metaTitle="$data['metaTitle']"
    :metaDescription="$data['metaDescription']"
>
    {{-- 1. Hero --}}
    <x-hero
        :title="$data['title']"
        :subtitle="$data['subtitle']"
        :primaryCta="$data['primaryCta']"
        :primaryCtaUrl="$data['primaryCtaUrl']"
        :secondaryCta="$data['secondaryCta']"
        :secondaryCtaUrl="$data['secondaryCtaUrl']"
    />

    {{-- 2. Typische Situationen --}}
    <x-section title="Kennen Sie das?" bgColor="bg-light">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($data['situationen'] as $sit)
                <div class="bg-white rounded-xl p-8 shadow-sm text-center">
                    <span class="text-4xl mb-4 block">{{ $sit['icon'] }}</span>
                    <h3 class="font-heading text-lg font-bold text-navy mb-2">{{ $sit['title'] }}</h3>
                    <p class="text-ink/70 text-sm">{{ $sit['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- 3. Passende Angebote --}}
    <x-section title="Passende Angebote">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($data['angebote'] as $angebot)
                <a href="{{ url($angebot['url']) }}" class="group bg-light rounded-xl p-8 hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-lg font-bold text-navy mb-3 group-hover:text-teal transition-colors">{{ $angebot['title'] }}</h3>
                    <p class="text-ink/70 text-sm mb-4">{{ $angebot['desc'] }}</p>
                    <span class="text-teal font-medium text-sm">Mehr erfahren →</span>
                </a>
            @endforeach
        </div>
    </x-section>

    {{-- 4. Relevante Themen --}}
    <x-section title="Relevante Themen" bgColor="bg-light">
        <div class="flex flex-wrap justify-center gap-3">
            @foreach($data['themen'] as $thema)
                <a href="{{ url('/themen') }}" class="inline-flex items-center px-4 py-2 rounded-full bg-white text-navy font-medium text-sm shadow-sm hover:bg-teal hover:text-white transition-colors">
                    {{ $thema }}
                </a>
            @endforeach
        </div>
    </x-section>

    {{-- 5. Referenzen --}}
    <x-section title="Das sagen andere">
        <div class="max-w-2xl mx-auto space-y-6">
            @foreach($data['testimonials'] as $t)
                <x-testimonial-card :zitat="$t['zitat']" :name="$t['name']" :organisation="$t['organisation']" />
            @endforeach
        </div>
    </x-section>

    {{-- 6. Abschluss-CTA --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">Bereit für den nächsten Schritt?</h2>
            <p class="text-white/80 mb-8">
                Lassen Sie uns in einem kostenlosen und unverbindlichen Gespräch herausfinden, wie ich Sie am besten unterstützen kann.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url($data['primaryCtaUrl']) }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                    {{ $data['primaryCta'] }}
                </a>
                <a href="{{ url($data['secondaryCtaUrl']) }}" class="inline-flex items-center justify-center px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                    {{ $data['secondaryCta'] }}
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
