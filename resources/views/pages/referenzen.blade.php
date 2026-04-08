<x-layouts.app
    :metaTitle="'Referenzen'"
    :metaDescription="'Was andere über die Zusammenarbeit mit B&U BundU sagen – Stimmen von Eltern, Fachpersonen und Institutionen.'"
>
    <x-hero
        title="Referenzen"
        subtitle="Was andere über die Zusammenarbeit mit mir sagen."
    />

    {{-- Wird in Phase 3 dynamisch aus Filament befüllt --}}
    <x-section>
        <div class="max-w-3xl mx-auto space-y-6">
            @foreach([
                ['zitat' => 'Die Beratung hat unsere ganze Familie verändert. Endlich fühle ich mich sicher in schwierigen Situationen.', 'name' => 'Platzhalter', 'organisation' => 'Wird nach Go-Live ersetzt'],
                ['zitat' => 'Professionell, empathisch und praxisnah – genau die Unterstützung, die unser Team gebraucht hat.', 'name' => 'Platzhalter', 'organisation' => 'Wird nach Go-Live ersetzt'],
                ['zitat' => 'Die Supervision mit Walter hat mir neue Perspektiven eröffnet und meine Arbeit deutlich verbessert.', 'name' => 'Platzhalter', 'organisation' => 'Wird nach Go-Live ersetzt'],
            ] as $ref)
                <x-testimonial-card :zitat="$ref['zitat']" :name="$ref['name']" :organisation="$ref['organisation']" />
            @endforeach
        </div>
    </x-section>

</x-layouts.app>
