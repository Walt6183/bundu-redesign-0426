@php $d = $data; @endphp

<x-section bgColor="{{ ($d['layout'] ?? 'full') === 'split' ? 'bg-light' : 'bg-white' }}">
    <div class="{{ ($d['layout'] ?? 'full') === 'split' ? 'grid grid-cols-1 lg:grid-cols-2 gap-12' : 'max-w-3xl mx-auto' }}">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-6">{{ $d['title'] }}</h2>
        @endif
        @if(!empty($d['content']))
            <div class="prose prose-navy max-w-none text-ink/80">{!! $d['content'] !!}</div>
        @endif
    </div>
</x-section>
