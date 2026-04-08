@props([
    'title',
    'subtitle' => null,
    'bgColor' => 'bg-white',
])

<section class="{{ $bgColor }} py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($title)
            <div class="text-center mb-12">
                <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy">{{ $title }}</h2>
                @if($subtitle)
                    <p class="mt-3 text-ink/70 max-w-2xl mx-auto">{{ $subtitle }}</p>
                @endif
            </div>
        @endif
        {{ $slot }}
    </div>
</section>
