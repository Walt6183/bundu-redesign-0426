@php $d = $data; @endphp

<x-section bgColor="bg-light">
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-4">
            {{ $d['title'] ?? '' }}
            @if(!empty($d['titleHighlight']))
                <span class="text-teal">{{ $d['titleHighlight'] }}</span>
            @endif
        </h2>
        @if(!empty($d['content']))
            <div class="prose prose-navy max-w-none text-ink/80 mx-auto">{!! $d['content'] !!}</div>
        @endif
        @if(!empty($d['quote']))
            <blockquote class="mt-8 text-lg italic text-navy/80 border-l-4 border-teal pl-6 text-left">
                {{ $d['quote'] }}
            </blockquote>
        @endif
    </div>
</x-section>
