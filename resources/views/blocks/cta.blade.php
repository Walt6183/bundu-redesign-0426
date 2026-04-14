@php $d = $data; @endphp

<section class="py-16 lg:py-20 bg-navy text-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">
            {{ $d['title'] ?? '' }}
            @if(!empty($d['titleHighlight']))
                <span class="text-yellow-300">{{ $d['titleHighlight'] }}</span>
            @endif
        </h2>
        @if(!empty($d['subtitle']))
            <p class="text-white/80 mb-8">{{ $d['subtitle'] }}</p>
        @endif
        @if(!empty($d['buttons']))
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @foreach($d['buttons'] as $btn)
                <a href="{{ $btn['href'] ?? '#' }}" class="inline-flex items-center justify-center px-6 py-3 {{ ($btn['style'] ?? 'primary') === 'primary' ? 'bg-teal text-white hover:bg-teal/90' : 'border border-white/30 text-white hover:bg-white/10' }} font-medium rounded-lg transition-colors">
                    {{ $btn['label'] ?? '' }}
                </a>
            @endforeach
        </div>
        @endif
    </div>
</section>
