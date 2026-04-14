@php $d = $data; @endphp

<section class="py-16 lg:py-20" id="{{ $d['id'] ?? '' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-8">
                <div>
                    @if(!empty($d['subtitle']))
                        <p class="text-teal font-medium text-sm uppercase tracking-wider mb-2">{{ $d['subtitle'] }}</p>
                    @endif
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy">{{ $d['title'] ?? '' }}</h2>
                </div>

                @if(!empty($d['description']))
                    <div class="prose prose-navy max-w-none text-ink/80">{!! $d['description'] !!}</div>
                @endif

                @if(!empty($d['features']))
                    <ul class="space-y-3">
                        @foreach($d['features'] as $feature)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-teal shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-ink/80">{{ is_array($feature) ? ($feature['text'] ?? '') : $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <aside>
                <div class="bg-navy text-white rounded-xl p-8 sticky top-24">
                    <h3 class="font-heading text-lg font-bold mb-4">Details</h3>
                    @if(!empty($d['duration']))
                        <p class="text-white/70 text-sm mb-2"><strong>Dauer:</strong> {{ $d['duration'] }}</p>
                    @endif
                    @if(!empty($d['location']))
                        <p class="text-white/70 text-sm mb-2"><strong>Ort:</strong> {{ $d['location'] }}</p>
                    @endif
                    @if(!empty($d['price']))
                        <p class="text-white/70 text-sm mb-4"><strong>Preis:</strong> {{ $d['price'] }}</p>
                    @endif
                    @if(!empty($d['buttonText']))
                        <a href="{{ $d['buttonLink'] ?? '/kontakt' }}" @if(!empty($d['isExternal'])) target="_blank" rel="noopener" @endif class="block w-full text-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors">
                            {{ $d['buttonText'] }}
                        </a>
                    @endif
                </div>
            </aside>
        </div>
    </div>
</section>
