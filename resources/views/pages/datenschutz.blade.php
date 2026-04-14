@php $pbWidgetId = \App\Models\Global_::where('key', 'site')->first()?->content['externalLinks']['privacyBeeWidgetId'] ?? null; @endphp

<x-layouts.app
    :metaTitle="'Datenschutz'"
    :metaDescription="'Datenschutzerklärung von B&U BundU – Informationen zum Umgang mit personenbezogenen Daten.'"
>
    <x-hero title="Datenschutzerklärung" bgColor="bg-navy" />

    <x-section>
        <div class="max-w-3xl mx-auto prose prose-navy">
            @if($pbWidgetId)
                <privacybee-widget website-id="{{ $pbWidgetId }}" type="dsg" lang="de"></privacybee-widget>
            @else
                <p><strong>Stand:</strong> April 2026</p>

                <h2>1. Allgemeines</h2>
                <p>
                    Der Schutz Ihrer persönlichen Daten ist mir ein wichtiges Anliegen.
                    In dieser Datenschutzerklärung informiere ich Sie über die Bearbeitung personenbezogener
                    Daten im Zusammenhang mit der Nutzung meiner Website <strong>bundu.ch</strong> und meinen Dienstleistungen.
                </p>

                <h2>2. Verantwortliche Stelle</h2>
                <address class="not-italic">
                    B&U BundU<br>
                    Walter Uehli<br>
                    Klosterstrasse 5<br>
                    CH-5626 Bremgarten<br>
                    E-Mail: <a href="mailto:info@bundu.ch">info@bundu.ch</a>
                </address>
            @endif
        </div>
    </x-section>

</x-layouts.app>
