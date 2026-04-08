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

    {{-- Wird in Phase 3 mit dynamischen Daten aus Filament befüllt --}}
    <x-section title="Alle Angebote" subtitle="Die Angebote werden nach dem Go-Live hier dynamisch angezeigt.">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'Online Beratung & Coaching', 'desc' => 'Individuelle Unterstützung für Eltern, Familien und Fachpersonen via coachingspace.', 'zielgruppe' => 'Eltern · Fachpersonen'],
                ['title' => 'Online Supervision', 'desc' => 'Professionelle digitale Begleitung für Teams und Institutionen.', 'zielgruppe' => 'Fachpersonen · Institutionen'],
                ['title' => 'Webinare & Kurse', 'desc' => 'Praxisnahe Online-Weiterbildungen zu Neuer Autorität und Systemik.', 'zielgruppe' => 'Alle Zielgruppen'],
                ['title' => 'Elternberatung', 'desc' => 'Begleitung bei Erziehungsfragen, Konflikten und Alltagsherausforderungen.', 'zielgruppe' => 'Eltern'],
                ['title' => 'Inhouse-Fortbildungen', 'desc' => 'Massgeschneiderte Weiterbildungen für Ihr gesamtes Team.', 'zielgruppe' => 'Institutionen'],
                ['title' => 'Bündner Standard', 'desc' => 'Zertifizierte Implementierung für ein sicheres Umfeld in Ihrer Institution.', 'zielgruppe' => 'Institutionen'],
            ] as $angebot)
                <div class="bg-light rounded-xl p-8">
                    <span class="text-xs font-medium text-teal uppercase tracking-wider">{{ $angebot['zielgruppe'] }}</span>
                    <h3 class="font-heading text-lg font-bold text-navy mt-2 mb-3">{{ $angebot['title'] }}</h3>
                    <p class="text-ink/70 text-sm">{{ $angebot['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </x-section>

</x-layouts.app>
