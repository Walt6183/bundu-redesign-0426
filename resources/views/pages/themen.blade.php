<x-layouts.app
    :metaTitle="'Themen'"
    :metaDescription="'Fachwissen und Orientierung zu Neuer Autorität, Systemischer Beratung, Coaching und mehr.'"
>
    <x-hero
        title="Themen"
        subtitle="Fachwissen und Orientierung zu den Herausforderungen, die dich beschäftigen."
    />

    {{-- Zielgruppen-Filter --}}
    <section class="py-8 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('themen') }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('zielgruppe') ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                    Alle
                </a>
                @foreach(['eltern' => 'Für Eltern', 'fachpersonen' => 'Für Fachpersonen', 'institutionen' => 'Für Institutionen'] as $key => $label)
                    <a href="{{ route('themen', ['zielgruppe' => $key]) }}"
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('zielgruppe') === $key ? 'bg-navy text-white' : 'bg-white text-navy hover:bg-navy/10' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-section>
        @if($themen->isEmpty())
            <div class="text-center py-12">
                <p class="text-ink/50 text-lg">Noch keine Themen vorhanden. Diese werden nach dem Go-Live hier angezeigt.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($themen as $thema)
                    <a href="{{ route('themen.show', $thema->slug) }}" class="group bg-light rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                        @if($thema->featured_image)
                            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $thema->featured_image) }}')"></div>
                        @else
                            <div class="h-48 bg-navy/5 flex items-center justify-center text-navy/20">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>
                            </div>
                        @endif
                        <div class="p-6">
                            @if($thema->zielgruppen)
                                <div class="flex flex-wrap gap-1 mb-2">
                                    @foreach($thema->zielgruppen as $zg)
                                        <span class="text-xs font-medium text-teal uppercase tracking-wider">{{ ucfirst($zg) }}</span>
                                        @if(!$loop->last) <span class="text-xs text-ink/30">·</span> @endif
                                    @endforeach
                                </div>
                            @endif
                            <h3 class="font-heading text-xl font-bold text-navy mb-2 group-hover:text-teal transition-colors">{{ $thema->titel }}</h3>
                            @if($thema->einleitung)
                                <p class="text-ink/70 text-sm line-clamp-3">{{ $thema->einleitung }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </x-section>

</x-layouts.app>
