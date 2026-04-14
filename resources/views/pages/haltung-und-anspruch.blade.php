<x-layouts.app
    :metaTitle="'Haltung & Anspruch – B&U BundU'"
    :metaDescription="'B&U BundU steht für Beratung und Unterstützung. Gewaltfreie Autorität, systemische Beratung und lösungsfokussiertes Coaching.'"
>
    {{-- Hero --}}
    <x-hero
        title="Haltung & Anspruch"
        subtitle="Beratung und Unterstützung – mit Klarheit, Empathie und Wirkung."
        bgColor="bg-navy"
    />

    <x-breadcrumbs :items="[['label' => 'Über B&U', 'url' => '/ueber-bundu'], ['label' => 'Haltung & Anspruch']]" />

    {{-- Haupttext --}}
    <x-section>
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
    <x-section title="Meine Ansätze" bgColor="bg-light">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'Neue Autorität', 'desc' => 'Basierend auf dem Konzept von Haim Omer – Beziehung statt Macht, Präsenz statt Kontrolle.'],
                ['title' => 'Systemische Beratung', 'desc' => 'Den Blick aufs ganze System richten – Lösungen im Kontext finden, Ressourcen aktivieren.'],
                ['title' => 'Lösungsfokussiertes Coaching', 'desc' => 'Zukunftsorientiert arbeiten – kleine Schritte, die zu nachhaltigen Veränderungen führen.'],
            ] as $method)
                <div class="bg-white rounded-xl p-8 shadow-sm">
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
