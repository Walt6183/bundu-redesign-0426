@php $pbWidgetId = \App\Models\Global_::where('key', 'site')->first()?->content['externalLinks']['privacyBeeWidgetId'] ?? null; @endphp

<x-layouts.app
    :metaTitle="'Impressum'"
    :metaDescription="'Impressum von B&U BundU – Walter Uehli, Klosterstrasse 5, CH-5626 Bremgarten.'"
>
    <x-hero title="Impressum" bgColor="bg-navy" />

    <x-section>
        <div class="max-w-3xl mx-auto prose prose-navy">
            @if($pbWidgetId)
                <imprint-widget website-id="{{ $pbWidgetId }}" lang="de"></imprint-widget>
            @else
                <h2>Kontaktadresse</h2>
                <address class="not-italic">
                    <strong>B&U BundU</strong><br>
                    Walter Uehli<br>
                    Klosterstrasse 5<br>
                    CH-5626 Bremgarten<br><br>
                    Telefon: <a href="tel:+41555056203">+41 (0)55 505 62 03</a><br>
                    E-Mail: <a href="mailto:info@bundu.ch">info@bundu.ch</a><br>
                    Web: <a href="https://bundu.ch">bundu.ch</a>
                </address>

                <h2>Vertretungsberechtigte Person</h2>
                <p>Walter Uehli, Inhaber</p>

                <h2>Haftungsausschluss</h2>
                <p>
                    Der Autor übernimmt keine Gewähr für die Richtigkeit, Genauigkeit, Aktualität,
                    Zuverlässigkeit und Vollständigkeit der Informationen auf dieser Website.
                </p>
            @endif
        </div>
    </x-section>

</x-layouts.app>
