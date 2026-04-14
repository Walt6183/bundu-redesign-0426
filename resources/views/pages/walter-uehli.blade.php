<x-layouts.app
    :metaTitle="'Walter Uehli – B&U BundU'"
    :metaDescription="'Walter Uehli – Dipl. Sozialpädagoge FH, Coach für Neue Autorität, Berater Bündner Standard. Über 25 Jahre Erfahrung in der Kinder- und Jugendhilfe.'"
>
    {{-- Hero --}}
    <x-hero
        title="Walter Uehli"
        subtitle="Systemischer Berater, Coach und Therapeut – mit über 25 Jahren Erfahrung."
        bgColor="bg-navy"
    />

    <x-breadcrumbs :items="[['label' => 'Über B&U', 'url' => '/ueber-bundu'], ['label' => 'Walter Uehli']]" />

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

    {{-- CTA --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">Lassen Sie uns ins Gespräch kommen</h2>
            <p class="text-white/80 mb-8">
                Ein erstes Kennenlernen ist kostenlos und unverbindlich. Erzählen Sie mir von Ihrem Anliegen.
            </p>
            <a href="{{ url('/kontakt') }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                Kostenloses Erstgespräch buchen
            </a>
        </div>
    </section>

</x-layouts.app>
