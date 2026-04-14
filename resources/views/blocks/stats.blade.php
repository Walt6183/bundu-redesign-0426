@php $d = $data; @endphp

@if(!empty($d['items']))
<section class="py-16 lg:py-20 bg-navy text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-{{ min(count($d['items']), 4) }} gap-8 text-center">
            @foreach($d['items'] as $stat)
            <div>
                <p class="font-heading text-4xl lg:text-5xl font-bold text-teal">
                    {{ $stat['number'] ?? '' }}{{ $stat['suffix'] ?? '' }}
                </p>
                <p class="mt-2 text-white/70 text-sm">{{ $stat['label'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
