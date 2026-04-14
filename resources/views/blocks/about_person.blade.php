@php
    $d = $data;
    $photoUrl = '';
    if (!empty($d['photo'])) {
        if (str_starts_with($d['photo'], 'http')) {
            $photoUrl = $d['photo'];
        } else {
            $photoUrl = asset($d['photo']);
        }
    }
@endphp

<section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <div class="flex justify-center lg:justify-start">
                @if($photoUrl)
                    <img src="{{ $photoUrl }}" alt="{{ $d['name'] ?? '' }}" class="w-72 h-72 rounded-2xl object-cover shadow-lg" loading="lazy" />
                @endif
            </div>
            <div>
                <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-2">{{ $d['name'] ?? '' }}</h2>
                @if(!empty($d['role']))
                    <p class="text-teal font-medium mb-6">{{ $d['role'] }}</p>
                @endif
                @if(!empty($d['bio']))
                    <div class="prose prose-navy max-w-none text-ink/80 mb-6">{!! $d['bio'] !!}</div>
                @endif
                @if(!empty($d['focusTags']))
                    <div class="flex flex-wrap gap-3">
                        @foreach($d['focusTags'] as $tag)
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-teal/10 text-teal">{{ is_array($tag) ? ($tag['tag'] ?? '') : $tag }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
