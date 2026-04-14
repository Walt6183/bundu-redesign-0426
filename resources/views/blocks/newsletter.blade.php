@php $d = $data; @endphp

<section class="py-16 lg:py-20 bg-navy text-white">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-2">{{ $d['title'] }}</h2>
        @endif
        @if(!empty($d['description']))
            <p class="text-white/70 text-sm mb-6">{{ $d['description'] }}</p>
        @endif
        @if(!empty($d['embedCode']))
            <iframe
                src="{{ $d['embedCode'] }}"
                style="border: 0; width: 100%; height: 260px;"
                frameborder="0"
                loading="lazy"
            ></iframe>
        @endif
    </div>
</section>
