@php $d = $data; @endphp

<x-section
    :title="$d['title'] ?? null"
    :subtitle="$d['subtitle'] ?? null"
>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($d['items'] as $book)
        <div class="bg-light rounded-xl p-6 flex gap-4">
            @if(!empty($book['cover']))
                <img src="{{ asset($book['cover']) }}" alt="{{ $book['title'] ?? '' }}" class="w-20 h-28 object-cover rounded shadow-sm shrink-0" loading="lazy" />
            @endif
            <div>
                <h3 class="font-heading font-bold text-navy mb-1">{{ $book['title'] ?? '' }}</h3>
                @if(!empty($book['author']))
                    <p class="text-ink/50 text-xs mb-2">{{ $book['author'] }}</p>
                @endif
                @if(!empty($book['description']))
                    <p class="text-ink/70 text-sm mb-2">{{ $book['description'] }}</p>
                @endif
                @if(!empty($book['link']))
                    <a href="{{ $book['link'] }}" target="_blank" rel="noopener" class="text-teal text-sm font-medium">Mehr →</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-section>
