@php
    $d = $data;
    $global = \App\Models\Global_::where('key', 'site')->first();
    $widgetId = $global?->content['externalLinks']['privacyBeeWidgetId'] ?? null;
@endphp

<x-section>
    <div class="max-w-4xl mx-auto">
        <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-8 text-center">Impressum</h2>

        @if($widgetId)
            <imprint-widget website-id="{{ $widgetId }}" lang="de"></imprint-widget>
        @else
            <div class="prose prose-navy max-w-none">
                @if(!empty($d['companyName']))
                    <h3>{{ $d['companyName'] }}</h3>
                @endif
                @if(!empty($d['address']))
                    <p>{!! nl2br(e($d['address'])) !!}</p>
                @endif
                @if(!empty($d['email']))
                    <p>E-Mail: <a href="mailto:{{ $d['email'] }}">{{ $d['email'] }}</a></p>
                @endif
                @if(!empty($d['phone']))
                    <p>Telefon: <a href="tel:{{ $d['phone'] }}">{{ $d['phone'] }}</a></p>
                @endif
                @if(!empty($d['representative']))
                    <p>Vertretungsberechtigte Person: {{ $d['representative'] }}</p>
                @endif
                @if(!empty($d['additionalInfo']))
                    {!! $d['additionalInfo'] !!}
                @endif
            </div>
        @endif
    </div>
</x-section>
