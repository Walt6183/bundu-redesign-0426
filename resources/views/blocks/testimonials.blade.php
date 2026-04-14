@php $d = $data; @endphp

<x-section>
    @if(!empty($d['items']))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($d['items'] as $t)
        <div class="bg-light rounded-xl p-6">
            <blockquote class="text-ink/80 italic mb-4">&laquo;{{ $t['quote'] ?? '' }}&raquo;</blockquote>
            <div class="text-sm">
                <p class="font-bold text-navy">{{ $t['author'] ?? '' }}</p>
                @if(!empty($t['course']))
                    <p class="text-ink/60">{{ $t['course'] }}</p>
                @endif
                @if(!empty($t['role']))
                    <p class="text-ink/60">{{ $t['role'] }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-section>
