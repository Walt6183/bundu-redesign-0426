<x-layouts.app
    :metaTitle="$thema->meta_titel ?: $thema->titel"
    :metaDescription="$thema->meta_beschreibung ?: $thema->einleitung"
>
    <x-hero
        :title="$thema->titel"
        :subtitle="$thema->einleitung"
    />

    <x-breadcrumbs :items="[['label' => 'Themen', 'url' => '/themen'], ['label' => $thema->titel]]" />

    {{-- Hauptinhalt --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                {{-- Content (2/3) --}}
                <div class="lg:col-span-2 space-y-12">

                    {{-- Zielgruppe-Tags --}}
                    @if($thema->zielgruppen)
                        <div class="flex flex-wrap gap-2">
                            @foreach($thema->zielgruppen as $zg)
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-teal/10 text-teal">{{ ucfirst($zg) }}</span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Problem --}}
                    @if($thema->problem)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Die Herausforderung</h2>
                            <div class="prose prose-navy max-w-none text-ink/80">{!! $thema->problem !!}</div>
                        </div>
                    @endif

                    {{-- Lösungsansatz --}}
                    @if($thema->loesungsansatz)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Der Lösungsansatz</h2>
                            <div class="prose prose-navy max-w-none text-ink/80">{!! $thema->loesungsansatz !!}</div>
                        </div>
                    @endif

                    {{-- FAQ zum Thema --}}
                    @if($thema->faqs->isNotEmpty())
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Häufige Fragen zu «{{ $thema->titel }}»</h2>
                            <x-faq-accordion :items="$thema->faqs->map(fn ($f) => ['frage' => $f->frage, 'antwort' => $f->antwort])->toArray()" />
                        </div>
                    @endif
                </div>

                {{-- Sidebar (1/3) --}}
                <aside class="space-y-6">

                    {{-- Passende Angebote --}}
                    @if($thema->angebote->isNotEmpty())
                        <div class="bg-light rounded-xl p-8">
                            <h3 class="font-heading text-lg font-bold text-navy mb-4">Passende Angebote</h3>
                            <ul class="space-y-3">
                                @foreach($thema->angebote as $angebot)
                                    <li>
                                        <a href="{{ route('angebote.show', $angebot->slug) }}" class="flex items-start gap-2 group">
                                            <span class="text-teal mt-0.5 shrink-0">→</span>
                                            <span class="text-sm text-navy group-hover:text-teal transition-colors font-medium">{{ $angebot->titel }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- CTA Box --}}
                    <div class="bg-navy text-white rounded-xl p-8 sticky top-24">
                        <h3 class="font-heading text-lg font-bold mb-3">Fragen zu diesem Thema?</h3>
                        <p class="text-white/70 text-sm mb-4">
                            Ich berate Sie gerne persönlich – kostenlos und unverbindlich.
                        </p>
                        <a href="{{ url('/kontakt') }}" class="block w-full text-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                            Kontakt aufnehmen
                        </a>
                    </div>

                    {{-- Bild --}}
                    @if($thema->featured_image)
                        <div class="rounded-xl overflow-hidden">
                            <img src="{{ asset($thema->featured_image) }}" alt="{{ $thema->titel }}" class="w-full h-auto">
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>

</x-layouts.app>
