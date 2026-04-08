@props([
    'title',
    'subtitle' => null,
    'primaryCta' => null,
    'primaryCtaUrl' => null,
    'secondaryCta' => null,
    'secondaryCtaUrl' => null,
    'bgColor' => 'bg-navy',
    'textColor' => 'text-white',
])

<section class="{{ $bgColor }} {{ $textColor }} py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="font-heading text-4xl lg:text-6xl font-bold mb-6">
            {!! $title !!}
        </h1>
        @if($subtitle)
            <p class="text-lg lg:text-xl opacity-80 max-w-2xl mx-auto mb-8">
                {{ $subtitle }}
            </p>
        @endif
        @if($primaryCta || $secondaryCta)
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if($primaryCta)
                    <a href="{{ $primaryCtaUrl }}" class="inline-flex items-center justify-center px-6 py-3 bg-teal text-white font-medium rounded-lg hover:bg-teal/90 transition-colors min-h-[44px]">
                        {{ $primaryCta }}
                    </a>
                @endif
                @if($secondaryCta)
                    <a href="{{ $secondaryCtaUrl }}" class="inline-flex items-center justify-center px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 transition-colors min-h-[44px]">
                        {{ $secondaryCta }}
                    </a>
                @endif
            </div>
        @endif
    </div>
</section>
