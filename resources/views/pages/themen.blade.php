<x-layouts.app
    :metaTitle="'Themen'"
    :metaDescription="'Fachwissen und Orientierung zu Neuer Autorität, Systemischer Beratung, Coaching und mehr.'"
>
    <x-hero
        title="Themen"
        subtitle="Fachwissen und Orientierung zu den Herausforderungen, die dich beschäftigen."
    />

    {{-- Wird in Phase 3 dynamisch aus Filament befüllt --}}
    <x-section>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'Neue Autorität', 'desc' => 'Beziehung statt Macht – der Ansatz für nachhaltige Erziehung und professionelle Arbeit mit Kindern und Jugendlichen.'],
                ['title' => 'Systemische Beratung', 'desc' => 'Den Blick aufs ganze System richten – Lösungen im Kontext finden, Ressourcen aktivieren.'],
                ['title' => 'Coaching für Eltern', 'desc' => 'Stärkung der eigenen Haltung und Handlungskompetenz im Familienalltag.'],
                ['title' => 'Teamentwicklung', 'desc' => 'Resiliente Teams durch professionelle systemische Begleitung und Reflexion.'],
                ['title' => 'Schutzkonzepte', 'desc' => 'Klare Strukturen zur Prävention von Grenzverletzungen in Institutionen.'],
                ['title' => 'Supervision', 'desc' => 'Professionelle Reflexion und Weiterentwicklung für Fachpersonen und Teams.'],
            ] as $thema)
                <div class="bg-light rounded-xl p-8 hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-xl font-bold text-navy mb-3">{{ $thema['title'] }}</h3>
                    <p class="text-ink/70 text-sm">{{ $thema['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </x-section>

</x-layouts.app>
