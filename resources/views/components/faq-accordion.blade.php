@props([
    'items' => [], // [{frage, antwort}, ...]
])

<div class="space-y-3" x-data="{ open: null }">
    @foreach($items as $i => $item)
        <div class="border border-light rounded-lg">
            <button
                @click="open = open === {{ $i }} ? null : {{ $i }}"
                class="flex items-center justify-between w-full px-6 py-4 text-left text-ink font-medium hover:bg-light/50 transition-colors min-h-[44px]"
                :aria-expanded="open === {{ $i }}"
            >
                <span>{{ $item['frage'] }}</span>
                <svg class="w-5 h-5 shrink-0 transition-transform" :class="open === {{ $i }} && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="open === {{ $i }}" x-collapse class="px-6 pb-4 text-ink/70">
                {!! $item['antwort'] !!}
            </div>
        </div>
    @endforeach
</div>
