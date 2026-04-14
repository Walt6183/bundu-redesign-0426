@php
    $d = $data;
    $widgetId = $d['widgetId'] ?? null;
    $widgetType = $d['widgetType'] ?? 'custom';

    // Auto-fetch PrivacyBee widget ID from Global_ settings if not provided
    if (!$widgetId && $widgetType === 'privacybee') {
        $widgetId = \App\Models\Global_::where('key', 'site')->first()?->content['externalLinks']['privacyBeeWidgetId'] ?? null;
    }
@endphp

<x-section>
    <div class="max-w-4xl mx-auto">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-8 text-center">{{ $d['title'] }}</h2>
        @endif

        @if($widgetType === 'privacybee' && $widgetId)
            <privacybee-widget website-id="{{ $widgetId }}" type="dsg" lang="de"></privacybee-widget>
        @elseif($widgetType === 'privacybee-imprint' && $widgetId)
            <imprint-widget website-id="{{ $widgetId }}" lang="de"></imprint-widget>
        @elseif(!empty($d['scriptUrl']))
            <div class="prose prose-navy max-w-none">{!! $d['scriptUrl'] !!}</div>
        @endif
    </div>
</x-section>
