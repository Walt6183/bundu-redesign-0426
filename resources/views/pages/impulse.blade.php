<x-layouts.app
    :metaTitle="'Impulse'"
    :metaDescription="'Fachartikel, Eltern-News und praktische Tipps von B&U BundU – regelmässig neue Impulse.'"
>
    <x-hero
        title="Impulse"
        subtitle="Fachwissen, Tipps und aktuelle Beiträge rund um Erziehung, Neue Autorität und Systemik."
    />

    {{-- Wird in Phase 4 dynamisch aus Filament befüllt --}}
    <x-section subtitle="Die Impulse werden nach dem Go-Live hier dynamisch angezeigt.">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for($i = 0; $i < 6; $i++)
                <article class="bg-light rounded-xl overflow-hidden">
                    <div class="h-48 bg-navy/5 flex items-center justify-center text-ink/20">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-medium text-teal uppercase tracking-wider">Impulse</span>
                        <h3 class="font-heading text-lg font-bold text-navy mt-2 mb-2">Beitrag wird geladen…</h3>
                        <p class="text-ink/60 text-sm">Erscheint nach Aktivierung des Content-Systems.</p>
                    </div>
                </article>
            @endfor
        </div>
    </x-section>

</x-layouts.app>
