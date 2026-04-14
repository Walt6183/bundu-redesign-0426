<x-layouts.app
    :metaTitle="'Downloads'"
    :metaDescription="'Kostenlose Checklisten, Leitfäden und Arbeitsblätter zu Erziehung, Neuer Autorität und Systemik.'"
>
    <x-hero
        title="Downloads"
        subtitle="Kostenlose Ressourcen für Eltern, Fachpersonen und Institutionen."
    />

    {{-- Kategorie-Filter --}}
    @if($kategorien->isNotEmpty())
        <section class="py-8 bg-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="{{ route('downloads') }}"
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('kategorie') ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                        Alle
                    </a>
                    @foreach($kategorien as $kat)
                        <a href="{{ route('downloads', ['kategorie' => $kat]) }}"
                           class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('kategorie') === $kat ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                            {{ ucfirst($kat) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-section>
        @if($downloads->isEmpty())
            <div class="text-center py-12">
                <p class="text-ink/50 text-lg">Noch keine Downloads vorhanden. Diese werden nach dem Go-Live hier angezeigt.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($downloads as $download)
                    <div class="bg-light rounded-xl p-6 flex flex-col">
                        <div class="flex items-start gap-4 mb-4">
                            <span class="text-3xl shrink-0">📄</span>
                            <div class="min-w-0">
                                <span class="text-xs font-medium text-teal uppercase tracking-wider">{{ ucfirst($download->kategorie ?? 'Dokument') }}</span>
                                <h3 class="font-heading text-lg font-bold text-navy mt-1">{{ $download->titel }}</h3>
                            </div>
                        </div>
                        @if($download->beschreibung)
                            <p class="text-ink/70 text-sm mb-4 flex-1">{{ $download->beschreibung }}</p>
                        @endif
                        @if($download->zielgruppe)
                            <span class="text-xs text-ink/40 mb-3">Für: {{ ucfirst($download->zielgruppe) }}</span>
                        @endif
                        @if($download->datei)
                            <a href="{{ asset($download->datei) }}" target="_blank" download
                               class="inline-flex items-center justify-center px-4 py-2 bg-teal text-white text-sm font-medium rounded-lg hover:bg-navy transition-colors mt-auto">
                                ↓ Herunterladen
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </x-section>

</x-layouts.app>
