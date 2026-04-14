@php $d = $data; @endphp

<x-section
    :title="$d['title'] ?? null"
    :subtitle="$d['subtitle'] ?? null"
    bgColor="bg-light"
>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($d['items'] as $dl)
        <div class="bg-white rounded-xl p-6 shadow-sm">
            @if(!empty($dl['type']))
                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-teal/10 text-teal mb-3">{{ $dl['type'] }}</span>
            @endif
            <h3 class="font-heading font-bold text-navy mb-2">{{ $dl['title'] ?? '' }}</h3>
            @if(!empty($dl['description']))
                <p class="text-ink/70 text-sm mb-4">{{ $dl['description'] }}</p>
            @endif
            @php $href = $dl['downloadUrl'] ?? (!empty($dl['file']) ? asset($dl['file']) : null); @endphp
            @if($href)
                <a href="{{ $href }}" download class="inline-flex items-center gap-2 text-teal font-medium text-sm hover:text-teal/80 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Download
                </a>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</x-section>
