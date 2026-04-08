<x-layouts.app
    :metaTitle="$angebot->meta_titel ?: $angebot->titel"
    :metaDescription="$angebot->meta_beschreibung ?: $angebot->kurzbeschreibung"
>
    {{-- Hero --}}
    <x-hero
        :title="$angebot->titel"
        :subtitle="$angebot->kurzbeschreibung"
        :primaryCta="$angebot->cta_text ?: 'Anfrage stellen'"
        :primaryCtaUrl="$angebot->cta_url ?: '/kontakt'"
    />

    <x-breadcrumbs :items="[['label' => 'Angebote', 'url' => '/angebote'], ['label' => $angebot->titel]]" />

    {{-- Hauptinhalt --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                {{-- Content (2/3) --}}
                <div class="lg:col-span-2 space-y-12">

                    {{-- Zielgruppe-Tags --}}
                    @if($angebot->zielgruppe)
                        <div class="flex flex-wrap gap-2">
                            @foreach($angebot->zielgruppe as $zg)
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-teal/10 text-teal">{{ ucfirst($zg) }}</span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Nutzen --}}
                    @if($angebot->nutzen)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Ihr Nutzen</h2>
                            <div class="prose prose-navy max-w-none text-ink/80">{!! $angebot->nutzen !!}</div>
                        </div>
                    @endif

                    {{-- Für wen --}}
                    @if($angebot->fuer_wen)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Für wen ist dieses Angebot?</h2>
                            <div class="prose prose-navy max-w-none text-ink/80">{!! $angebot->fuer_wen !!}</div>
                        </div>
                    @endif

                    {{-- Inhalte --}}
                    @if($angebot->inhalte)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Inhalte</h2>
                            <div class="prose prose-navy max-w-none text-ink/80">{!! $angebot->inhalte !!}</div>
                        </div>
                    @endif

                    {{-- Ablauf --}}
                    @if($angebot->ablauf)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Ablauf</h2>
                            <div class="prose prose-navy max-w-none text-ink/80">{!! $angebot->ablauf !!}</div>
                        </div>
                    @endif

                    {{-- FAQ --}}
                    @if($angebot->faqs && count($angebot->faqs) > 0)
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Häufige Fragen zu diesem Angebot</h2>
                            <x-faq-accordion :items="$angebot->faqs" />
                        </div>
                    @endif

                    {{-- Verwandte Themen --}}
                    @if($angebot->themen->isNotEmpty())
                        <div>
                            <h2 class="font-heading text-xl font-bold text-navy mb-4">Verwandte Themen</h2>
                            <div class="flex flex-wrap gap-3">
                                @foreach($angebot->themen as $thema)
                                    <a href="{{ route('themen.show', $thema->slug) }}" class="px-4 py-2 rounded-full bg-light text-navy text-sm font-medium hover:bg-teal hover:text-white transition-colors">
                                        {{ $thema->titel }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar (1/3) --}}
                <aside class="space-y-6">
                    {{-- CTA Box --}}
                    <div class="bg-navy text-white rounded-xl p-8 sticky top-24">
                        <h3 class="font-heading text-lg font-bold mb-3">Interessiert?</h3>

                        @if($angebot->preis_info)
                            <p class="text-white/70 text-sm mb-4">{!! nl2br(e($angebot->preis_info)) !!}</p>
                        @endif

                        <a href="{{ $angebot->cta_url ?: url('/kontakt') }}" class="block w-full text-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors mb-3">
                            {{ $angebot->cta_text ?: 'Anfrage stellen' }}
                        </a>
                        <a href="{{ url('/kontakt') }}" class="block w-full text-center px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                            Kostenloses Erstgespräch
                        </a>
                    </div>

                    {{-- Bild --}}
                    @if($angebot->featured_image)
                        <div class="rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $angebot->featured_image) }}" alt="{{ $angebot->titel }}" class="w-full h-auto">
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>

    {{-- Verwandte Angebote --}}
    @if($verwandte->isNotEmpty())
        <x-section title="Weitere Angebote" bgColor="bg-light">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($verwandte as $item)
                    <a href="{{ route('angebote.show', $item->slug) }}" class="group bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="font-heading text-lg font-bold text-navy mb-2 group-hover:text-teal transition-colors">{{ $item->titel }}</h3>
                        <p class="text-ink/70 text-sm line-clamp-2">{{ $item->kurzbeschreibung }}</p>
                        <span class="inline-block mt-3 text-teal font-medium text-sm">Mehr erfahren →</span>
                    </a>
                @endforeach
            </div>
        </x-section>
    @endif

</x-layouts.app>
