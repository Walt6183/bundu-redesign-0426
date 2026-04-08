<x-layouts.app
    :metaTitle="'FAQ'"
    :metaDescription="'Häufig gestellte Fragen zu Beratung, Coaching und Angeboten von B&U BundU.'"
>
    <x-hero
        title="Häufige Fragen"
        subtitle="Antworten auf die wichtigsten Fragen rund um meine Angebote und Arbeitsweise."
    />

    <x-section>
        <div class="max-w-3xl mx-auto">
            <x-faq-accordion :items="[
                ['frage' => 'Wie läuft ein Erstgespräch ab?', 'antwort' => 'Das Erstgespräch ist kostenlos und unverbindlich. Wir lernen uns kennen, klären dein Anliegen und schauen gemeinsam, welches Angebot am besten passt. Das Gespräch findet online via Videokonferenz statt und dauert ca. 30 Minuten.'],
                ['frage' => 'Finden die Beratungen online statt?', 'antwort' => 'Ja, alle Beratungen, Coachings und Supervisionen finden online statt – bequem von zu Hause oder vom Arbeitsplatz aus. Ich nutze dafür die DSGVO-konforme Plattform coachingspace.de.'],
                ['frage' => 'Was kostet eine Beratung?', 'antwort' => 'Die Kosten variieren je nach Angebot und Umfang. Einzelberatungen starten ab CHF 150 pro Stunde. Im kostenlosen Erstgespräch besprechen wir transparent die Konditionen für dein Anliegen.'],
                ['frage' => 'Für wen sind die Angebote geeignet?', 'antwort' => 'Meine Angebote richten sich an Eltern, Fachpersonen im pädagogischen Bereich und Institutionen in der Deutschschweiz. Ob Erziehungsfragen, Supervision oder Teamentwicklung – gemeinsam finden wir die passende Lösung.'],
                ['frage' => 'Was ist Neue Autorität?', 'antwort' => 'Neue Autorität ist ein Konzept von Haim Omer, das auf Präsenz, Beharrlichkeit und gewaltlosem Widerstand basiert. Es bietet Eltern und Fachpersonen einen Rahmen, Konflikte deeskalierend und beziehungsorientiert zu lösen.'],
                ['frage' => 'Wie kann ich mich für einen Kurs anmelden?', 'antwort' => 'Über das Kontaktformular oder per E-Mail an info@bundu.ch. Für den Kurs «Systemische Gesprächsführung» gibt es auf der Seite für Institutionen ein spezielles Anmeldeformular.'],
                ['frage' => 'Was ist der Bündner Standard?', 'antwort' => 'Der Bündner Standard ist ein Schutzkonzept für Institutionen der Kinder- und Jugendhilfe. Er definiert klare Strukturen zur Prävention von Grenzverletzungen und fördert eine Kultur der Achtsamkeit.'],
                ['frage' => 'Arbeiten Sie auch mit Institutionen ausserhalb der Deutschschweiz?', 'antwort' => 'Mein Hauptfokus liegt auf der Deutschschweiz, aber dank der Online-Angebote ist eine Zusammenarbeit grundsätzlich auch über die Landesgrenzen hinaus möglich. Kontaktieren Sie mich gerne für ein Gespräch.'],
            ]" />
        </div>
    </x-section>

    {{-- CTA --}}
    <section class="py-16 lg:py-20 bg-navy text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold mb-4">Noch Fragen?</h2>
            <p class="text-white/80 mb-8">Kontaktieren Sie mich – ich beantworte Ihre Fragen gerne persönlich.</p>
            <x-cta-button text="Kontakt aufnehmen" url="/kontakt" variant="primary" />
        </div>
    </section>

</x-layouts.app>
