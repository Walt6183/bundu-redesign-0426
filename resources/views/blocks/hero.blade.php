@php $d = $data; @endphp

<x-hero
    :title="($d['title'] ?? '') . (isset($d['titleHighlight']) && $d['titleHighlight'] ? ' <span class=&quot;text-yellow-300&quot;>' . e($d['titleHighlight']) . '</span>' : '')"
    :subtitle="$d['subtitle'] ?? null"
    :primaryCta="($d['buttons'] ?? [])[0]['label'] ?? null"
    :primaryCtaUrl="($d['buttons'] ?? [])[0]['href'] ?? null"
    :secondaryCta="($d['buttons'] ?? [])[1]['label'] ?? null"
    :secondaryCtaUrl="($d['buttons'] ?? [])[1]['href'] ?? null"
/>

@if(!empty($d['badges']))
<div class="bg-navy text-white pb-8 -mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-3">
        @foreach($d['badges'] as $badge)
            <span class="px-3 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white/90">{{ is_array($badge) ? ($badge['text'] ?? '') : $badge }}</span>
        @endforeach
    </div>
</div>
@endif
