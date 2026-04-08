@props([
    'text',
    'url',
    'variant' => 'primary', // primary, secondary, ghost
])

@php
    $classes = match($variant) {
        'primary' => 'bg-teal text-white hover:bg-teal/90',
        'secondary' => 'bg-navy text-white hover:bg-navy/90',
        'ghost' => 'border border-navy/20 text-navy hover:bg-light',
        default => 'bg-teal text-white hover:bg-teal/90',
    };
@endphp

<a href="{{ $url }}" class="inline-flex items-center justify-center px-6 py-3 font-medium rounded-lg transition-colors min-h-[44px] {{ $classes }}">
    {{ $text }}
</a>
