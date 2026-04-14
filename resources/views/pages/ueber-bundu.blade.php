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
                        Ich kenne die Arbeit mit Kindern, Jugendlichen und Familien von innen. Mehr als 25 Jahre habe ich
                        in der stationären Kinder- und Jugendhilfe gearbeitet, zunächst als Pädagogischer Leiter, ab 2015
                        als Gesamtleiter eines Schulheims. Parallel dazu war ich als diplomierter Paar- und Familientherapeut
                        ZAK tätig und habe Familien in belasteten Lebenssituationen begleitet. In dieser Zeit habe ich erlebt,
                        wie viel von der Beziehungsqualität zwischen Erwachsenen und Kindern abhängt, und wie wenig davon mit
                        Druck allein zu erreichen ist.
                    </p>
                    <p class="text-ink/80 mb-4">
                        Heute begleite ich Familien, pädagogische Fachpersonen und Institutionen als systemischer Berater und
                        Coach. Mein Ansatz, das BundU-Prinzip, integriert die Methoden der Neuen Autorität nach Haim Omer,
                        lösungsfokussierte Gesprächsführung und systemisches Denken. In der Praxis bedeutet das: Ich arbeite
                        nicht gegen Widerstand, sondern helfe, tragfähige Beziehungen wiederherzustellen, klare Haltungen zu
                        entwickeln und Eskalationen zu unterbrechen, bevor sie sich festigen.
                    </p>
                    <p class="text-ink/80 mb-4">
                        Als akkreditierter Berater des Bündner Standards begleite ich Institutionen in der Deutschschweiz und
                        im deutschsprachigen Raum bei der Einführung dieses praxiserprobten Instruments. Der Bündner Standard
                        umfasst zehn Kernelemente zur strukturierten Erfassung und professionellen Bearbeitung von
                        Grenzverletzungen im organisierten Kontext und schafft damit eine verlässliche Grundlage für den
                        Schutz aller Beteiligten.
                    </p>
                    <p class="text-ink/80 mb-4">
                        Beratung und Coaching biete ich persönlich sowie über eine DSGVO-konforme Online-Plattform an, die
                        eine ortsunabhängige Zusammenarbeit ermöglicht. Institutionen, die den Bündner Standard einführen oder
                        ihr Schutzkonzept weiterentwickeln möchten, begleite ich im Rahmen von massgeschneiderten Projekten,
                        von der Analyse bis zur nachhaltigen Verankerung im Alltag.
                    </p>
                    <p class="text-ink/80 mb-6">
                        Das Wissen, das ich weitergebe, habe ich selbst angewendet, überprüft und angepasst.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['Dipl. Sozialpädagoge FH', 'Coach für Neue Autorität', 'Berater Bündner Standard', 'Dipl. Paar- und Familientherapeut ZAK', 'SVEB I'] as $badge)
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-teal/10 text-teal">{{ $badge }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Haltung & Anspruch --}}
    <x-section title="Haltung & Anspruch" bgColor="bg-light">
        <div class="max-w-3xl mx-auto space-y-6 text-ink/80">
            <p>
                B&U BundU steht für Beratung und Unterstützung. Ich begleite Eltern, Fachpersonen und Institutionen
                dabei, tragfähige Beziehungen zu gestalten. Im Zentrum stehen Methoden, die im Alltag wirksam und
                umsetzbar sind.
            </p>
            <p>
                Grundlage meiner Arbeit ist eine gewaltfreie Autorität. Sie zeigt sich in Präsenz, Klarheit und
                Beharrlichkeit. Coaching verstehe ich als Prozess, der vorhandene Ressourcen stärkt und neue
                Handlungsmöglichkeiten eröffnet. Die Beratung erfolgt auf Augenhöhe, empathisch, respektvoll
                und konsequent lösungsorientiert.
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
