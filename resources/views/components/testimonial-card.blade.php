@props([
    'zitat',
    'name',
    'organisation' => null,
])

<blockquote class="bg-white rounded-xl p-6 shadow-sm border border-light">
    <p class="text-ink/80 italic mb-4">«{{ $zitat }}»</p>
    <footer class="text-sm">
        <span class="font-medium text-navy">{{ $name }}</span>
        @if($organisation)
            <span class="text-ink/50"> · {{ $organisation }}</span>
        @endif
    </footer>
</blockquote>
