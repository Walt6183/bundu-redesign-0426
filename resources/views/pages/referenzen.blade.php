<x-layouts.app
    :metaTitle="'Referenzen'"
    :metaDescription="'Was andere über die Zusammenarbeit mit B&U BundU sagen – Stimmen von Eltern, Fachpersonen und Institutionen.'"
>
    <x-hero
        title="Referenzen"
        subtitle="Was andere über die Zusammenarbeit mit mir sagen."
    />

    <x-section>
        @if($referenzen->isEmpty())
            <div class="text-center py-12">
                <p class="text-ink/50 text-lg">Noch keine Referenzen vorhanden. Diese werden nach dem Go-Live hier angezeigt.</p>
            </div>
        @else
            <div class="max-w-3xl mx-auto space-y-6">
                @foreach($referenzen as $referenz)
                    <div class="bg-white rounded-xl p-8 shadow-sm border border-light flex gap-6 items-start">
                        @if($referenz->bild)
                            <img src="{{ asset('storage/' . $referenz->bild) }}" alt="{{ $referenz->name }}" class="w-16 h-16 rounded-full object-cover shrink-0">
                        @endif
                        <div>
                            <blockquote class="text-ink/80 italic mb-3">«{{ $referenz->zitat }}»</blockquote>
                            <footer class="text-sm">
                                <span class="font-medium text-navy">{{ $referenz->name }}</span>
                                @if($referenz->organisation)
                                    <span class="text-ink/50"> · {{ $referenz->organisation }}</span>
                                @endif
                                @if($referenz->zielgruppe)
                                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs bg-teal/10 text-teal">{{ ucfirst($referenz->zielgruppe) }}</span>
                                @endif
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </x-section>

    {{-- CTA --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">Überzeugt?</h2>
            <p class="text-white/80 mb-8">Starten Sie mit einem kostenlosen Erstgespräch – ich freue mich auf Sie.</p>
            <a href="{{ url('/kontakt') }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                Kontakt aufnehmen
            </a>
        </div>
    </section>

</x-layouts.app>
