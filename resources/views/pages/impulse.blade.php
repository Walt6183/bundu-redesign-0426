<x-layouts.app
    :metaTitle="'Impulse'"
    :metaDescription="'Fachartikel, Eltern-News und praktische Tipps von B&U BundU – regelmässig neue Impulse.'"
>
    <x-hero
        title="Impulse"
        subtitle="Fachwissen, Tipps und aktuelle Beiträge rund um Erziehung, Neue Autorität und Systemik."
    />

    {{-- Kategorie-Filter --}}
    @if($kategorien->isNotEmpty())
        <section class="py-8 bg-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="{{ route('impulse') }}"
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('kategorie') ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                        Alle
                    </a>
                    @foreach($kategorien as $kat)
                        <a href="{{ route('impulse', ['kategorie' => $kat]) }}"
                           class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('kategorie') === $kat ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                            {{ ucfirst(str_replace('-', ' ', $kat)) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-section>
        @if($impulse->isEmpty())
            <div class="text-center py-12">
                <p class="text-ink/50 text-lg">Noch keine Impulse vorhanden. Diese werden nach dem Go-Live hier angezeigt.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($impulse as $item)
                    <a href="{{ route('impulse.show', $item->slug) }}" class="group bg-light rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                        @if($item->featured_image)
                            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset($item->featured_image) }}')"></div>
                        @else
                            <div class="h-48 bg-navy/5 flex items-center justify-center text-navy/20">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-2">
                                @if($item->kategorie)
                                    <span class="text-xs font-medium text-teal uppercase tracking-wider">{{ ucfirst(str_replace('-', ' ', $item->kategorie)) }}</span>
                                @endif
                                @if($item->datum)
                                    <span class="text-xs text-ink/40">{{ $item->datum->format('d.m.Y') }}</span>
                                @endif
                            </div>
                            <h3 class="font-heading text-lg font-bold text-navy mb-2 group-hover:text-teal transition-colors">{{ $item->titel }}</h3>
                            @if($item->intro)
                                <p class="text-ink/70 text-sm line-clamp-3">{{ $item->intro }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $impulse->withQueryString()->links() }}
            </div>
        @endif
    </x-section>

</x-layouts.app>
