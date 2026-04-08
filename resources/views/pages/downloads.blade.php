<x-layouts.app
    :metaTitle="'Downloads'"
    :metaDescription="'Kostenlose Checklisten, Leitfäden und Arbeitsblätter zu Erziehung, Neuer Autorität und Systemik.'"
>
    <x-hero
        title="Downloads"
        subtitle="Kostenlose Ressourcen für Eltern, Fachpersonen und Institutionen."
    />

    {{-- Wird in Phase 3 dynamisch aus Filament befüllt --}}
    <x-section subtitle="Die Downloads werden nach dem Go-Live hier angezeigt.">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(['Checklisten', 'Leitfäden', 'Arbeitsblätter'] as $kategorie)
                <div class="bg-light rounded-xl p-8 text-center">
                    <span class="text-3xl mb-3 block">📄</span>
                    <h3 class="font-heading text-lg font-bold text-navy mb-2">{{ $kategorie }}</h3>
                    <p class="text-ink/60 text-sm">Erscheint nach Aktivierung des Content-Systems.</p>
                </div>
            @endforeach
        </div>
    </x-section>

</x-layouts.app>
