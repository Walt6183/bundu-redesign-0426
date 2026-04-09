<x-layouts.app
    :metaTitle="'Über B&U'"
    :metaDescription="'Walter Uehli – Dipl. Sozialpädagoge, Coach für Neue Autorität. Über 20 Jahre Erfahrung in der stationären Kinder- und Jugendhilfe.'"
>
    {{-- Hero --}}
    <x-hero
        title="Über B&U BundU"
        subtitle="Beratung & Unterstützung – mit Erfahrung, Empathie und Haltung."
        bgColor="bg-navy"
    />

    {{-- Portrait & Biographie --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div class="flex justify-center lg:justify-start">
                    <img src="{{ asset('images/walter-uehli.png') }}" alt="Walter Uehli – Systemischer Berater und Coach" class="w-72 h-72 rounded-2xl object-cover shadow-lg" loading="lazy" />
                </div>
                <div>
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-6">Walter Uehli</h2>
                    <p class="text-ink/80 mb-4">
                        Mit 65 Jahren und über 20 Jahren Erfahrung in der stationären Kinder- und Jugendhilfe bringe ich
                        fundiertes Praxiswissen mit. In Schulheimen war ich zunächst als Pädagogischer Leiter und seit
                        2015 als Gesamtleiter tätig. Mit dem Ende des Schuljahres 2025/26 gehe ich in Pension – und habe
                        damit wieder Zeit, mich voll meinem Unternehmen B&U BundU zu widmen.
                    </p>
                    <p class="text-ink/80 mb-6">
                        Meine Arbeit basiert auf dem BundU-Prinzip – einem integrativen Ansatz, der bewährte Methoden der
                        Neuen Autorität, lösungsfokussierte Ansätze und systemische Gesprächsführung verbindet.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['Dipl. Sozialpädagoge', 'Coach für Neue Autorität', 'SVEB I'] as $badge)
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-teal/10 text-teal">{{ $badge }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission & Haltung --}}
    <x-section title="Mission & Haltung" bgColor="bg-light">
        <div class="max-w-3xl mx-auto space-y-6 text-ink/80">
            <p>
                B&U BundU steht für <strong class="text-navy">Beratung & Unterstützung</strong>. Mein Ziel ist es,
                Eltern, Fachpersonen und Institutionen darin zu stärken, tragfähige Beziehungen zu gestalten –
                mit professionellen Methoden, die im Alltag wirklich funktionieren.
            </p>
            <p>
                Ich glaube an gewaltfreie Autorität, die auf Präsenz, Transparenz und Beharrlichkeit basiert.
                An Coaching, das die Ressourcen des Gegenübers aktiviert. Und an Beratung auf Augenhöhe –
                empathisch, respektvoll und lösungsorientiert.
            </p>
        </div>
    </x-section>

    {{-- Methoden & Ansätze --}}
    <x-section title="Meine Ansätze">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'Neue Autorität', 'desc' => 'Basierend auf dem Konzept von Haim Omer – Beziehung statt Macht, Präsenz statt Kontrolle.'],
                ['title' => 'Systemische Beratung', 'desc' => 'Den Blick aufs ganze System richten – Lösungen im Kontext finden, Ressourcen aktivieren.'],
                ['title' => 'Lösungsfokussiertes Coaching', 'desc' => 'Zukunftsorientiert arbeiten – kleine Schritte, die zu nachhaltigen Veränderungen führen.'],
            ] as $method)
                <div class="bg-light rounded-xl p-8">
                    <h3 class="font-heading text-lg font-bold text-navy mb-3">{{ $method['title'] }}</h3>
                    <p class="text-ink/70 text-sm">{{ $method['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- BundU-Prinzip --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-6">Das BundU-Prinzip</h2>
            <p class="text-white/80 mb-8">
                Ein integrativer Ansatz, der bewährte Methoden verbindet: Neue Autorität, systemische
                Gesprächsführung und lösungsfokussiertes Coaching. Massgeschneidert für die Praxis.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/kontakt') }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                    Kostenloses Erstgespräch
                </a>
                <a href="{{ url('/angebote') }}" class="inline-flex items-center justify-center px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                    Angebote ansehen
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
