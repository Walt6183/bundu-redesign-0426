<x-layouts.app
    :metaTitle="$impuls->meta_titel ?: $impuls->titel"
    :metaDescription="$impuls->meta_beschreibung ?: $impuls->intro"
>
    <x-breadcrumbs :items="[['label' => 'Impulse', 'url' => '/impulse'], ['label' => $impuls->titel]]" />

    @push('jsonld')
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Article",
        "headline": @json($impuls->titel),
        "description": @json($impuls->intro),
        "author": {
            "@@type": "Person",
            "name": @json($impuls->autor ?: 'Walter Uehli')
        },
        @if($impuls->datum)
        "datePublished": "{{ $impuls->datum->toIso8601String() }}",
        @endif
        @if($impuls->featured_image)
        "image": "{{ asset($impuls->featured_image) }}",
        @endif
        "publisher": {
            "@@type": "Organization",
            "name": "B&U BundU"
        },
        "mainEntityOfPage": "{{ url()->current() }}"
    }
    </script>
    @endpush

    {{-- Hero --}}
    <section class="bg-navy text-white py-16 lg:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-4">
                @if($impuls->kategorie)
                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-teal/20 text-teal">{{ ucfirst(str_replace('-', ' ', $impuls->kategorie)) }}</span>
                @endif
                @if($impuls->datum)
                    <span class="text-white/50 text-sm">{{ $impuls->datum->format('d. F Y') }}</span>
                @endif
            </div>
            <h1 class="font-heading text-3xl lg:text-5xl font-bold mb-4">{{ $impuls->titel }}</h1>
            @if($impuls->autor)
                <p class="text-white/60">Von {{ $impuls->autor }}</p>
            @endif
        </div>
    </section>

    {{-- Artikel --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">

                {{-- Content (3/4) --}}
                <article class="lg:col-span-3 space-y-8">

                    {{-- Featured Image --}}
                    @if($impuls->featured_image)
                        <div class="rounded-xl overflow-hidden">
                            <img src="{{ asset($impuls->featured_image) }}" alt="{{ $impuls->titel }}" class="w-full h-auto">
                        </div>
                    @endif

                    {{-- Intro --}}
                    @if($impuls->intro)
                        <p class="text-lg text-ink/80 font-medium leading-relaxed">{{ $impuls->intro }}</p>
                    @endif

                    {{-- Inhalt --}}
                    @if($impuls->inhalt)
                        <div class="prose prose-navy prose-lg max-w-none">{!! $impuls->inhalt !!}</div>
                    @endif

                    {{-- Key Takeaways --}}
                    @if($impuls->key_takeaways && count($impuls->key_takeaways) > 0)
                        <div class="bg-teal/5 border border-teal/20 rounded-xl p-8">
                            <h3 class="font-heading text-lg font-bold text-navy mb-4">Das Wichtigste in Kürze</h3>
                            <ul class="space-y-3">
                                @foreach($impuls->key_takeaways as $takeaway)
                                    <li class="flex items-start gap-3">
                                        <span class="text-teal mt-1 shrink-0">✓</span>
                                        <span class="text-ink/80">{{ $takeaway }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Tags --}}
                    @if($impuls->tags && count($impuls->tags) > 0)
                        <div class="flex flex-wrap gap-2 pt-4 border-t border-light">
                            @foreach($impuls->tags as $tag)
                                <a href="{{ route('impulse', ['tag' => $tag]) }}" class="px-3 py-1 rounded-full text-xs font-medium bg-light text-navy hover:bg-teal hover:text-white transition-colors">
                                    #{{ $tag }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </article>

                {{-- Sidebar (1/4) --}}
                <aside class="space-y-6">

                    {{-- Lead-Box --}}
                    @if($impuls->lead_box_text)
                        <div class="bg-navy text-white rounded-xl p-6 sticky top-24">
                            <p class="text-white/80 text-sm mb-4">{{ $impuls->lead_box_text }}</p>
                            @if($impuls->lead_box_cta)
                                <a href="{{ url('/kontakt') }}" class="block w-full text-center px-4 py-2 bg-teal text-white text-sm font-medium rounded-lg hover:bg-teal/90 transition-colors">
                                    {{ $impuls->lead_box_cta }}
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="bg-navy text-white rounded-xl p-6 sticky top-24">
                            <h3 class="font-heading text-base font-bold mb-2">Beratung gewünscht?</h3>
                            <p class="text-white/70 text-sm mb-4">Kostenloses Erstgespräch – online und unverbindlich.</p>
                            <a href="{{ url('/kontakt') }}" class="block w-full text-center px-4 py-2 bg-teal text-white text-sm font-medium rounded-lg hover:bg-teal/90 transition-colors">
                                Kontakt aufnehmen
                            </a>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>

    {{-- Weitere Impulse --}}
    @if($weitere->isNotEmpty())
        <x-section title="Weitere Impulse" bgColor="bg-light">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($weitere as $item)
                    <a href="{{ route('impulse.show', $item->slug) }}" class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        @if($item->featured_image)
                            <div class="h-40 bg-cover bg-center" style="background-image: url('{{ asset($item->featured_image) }}')"></div>
                        @else
                            <div class="h-40 bg-navy/5 flex items-center justify-center text-navy/20">
                                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="font-heading text-base font-bold text-navy group-hover:text-teal transition-colors line-clamp-2">{{ $item->titel }}</h3>
                            @if($item->datum)
                                <span class="text-xs text-ink/40 mt-1 block">{{ $item->datum->format('d.m.Y') }}</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </x-section>
    @endif

</x-layouts.app>
