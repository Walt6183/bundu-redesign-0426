@php $d = $data; @endphp

<x-section
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) ? ' ' . $d['titleHighlight'] : '')"
>
    @if(!empty($d['steps']))
    <div class="max-w-3xl mx-auto space-y-8">
        @foreach($d['steps'] as $step)
        <div class="flex gap-6 items-start">
            <div class="w-12 h-12 bg-teal rounded-full flex items-center justify-center shrink-0">
                <span class="text-white font-bold text-lg">{{ $step['number'] ?? $loop->iteration }}</span>
            </div>
            <div>
                <h3 class="font-heading text-lg font-bold text-navy mb-2">{{ $step['title'] ?? '' }}</h3>
                @if(!empty($step['description']))
                    <p class="text-ink/70">{{ $step['description'] }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-section>
