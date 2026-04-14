<x-layouts.app
    :metaTitle="'Kontakt'"
    :metaDescription="'Buchen Sie direkt ein kostenloses Erstgespräch oder kontaktieren Sie B&U BundU – ich melde mich innerhalb von 24 Stunden.'"
>
    {{-- Hero --}}
    <x-hero
        title="Kontakt"
        subtitle="Sind Sie bereit, den nächsten Schritt zu gehen? Lassen Sie uns in einem kostenlosen und unverbindlichen Erstgespräch herausfinden, wie ich Sie am besten unterstützen kann."
        bgColor="bg-navy"
    />

    {{-- Hauptbereich: Kalender + Formular --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                {{-- Links: Terminbuchung --}}
                <div>
                    <div class="bg-navy text-white rounded-t-xl px-6 py-4 flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h2 class="font-heading text-lg font-bold">Termin direkt buchen</h2>
                    </div>

                    @if($calendarUrl)
                        <div class="bg-white rounded-b-xl border border-t-0 border-ink/10 overflow-hidden">
                            <iframe
                                src="{{ $calendarUrl }}"
                                style="border: 0; width: 100%; height: 680px;"
                                frameborder="0"
                                loading="lazy"
                            ></iframe>
                        </div>
                    @else
                        <div class="bg-light rounded-b-xl border border-t-0 border-ink/10 p-12 text-center">
                            <p class="text-ink/70">Die Online-Terminbuchung wird in Kürze verfügbar sein.</p>
                            <p class="text-ink/50 text-sm mt-2">Nutzen Sie in der Zwischenzeit das Kontaktformular.</p>
                        </div>
                    @endif

                    {{-- Kurzinfos unter Kalender --}}
                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-start gap-3 text-sm">
                            <span class="text-teal text-lg mt-0.5">⏱️</span>
                            <div>
                                <p class="font-medium text-navy">15 Minuten</p>
                                <p class="text-ink/60">Kostenlos & unverbindlich</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 text-sm">
                            <span class="text-teal text-lg mt-0.5">💻</span>
                            <div>
                                <p class="font-medium text-navy">Google Meet</p>
                                <p class="text-ink/60">Bequem von zu Hause</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Rechts: Kontaktformular + Kontaktinfos --}}
                <div class="space-y-8">
                    {{-- Formular --}}
                    <div class="bg-white rounded-xl border border-ink/10 p-8">
                        <h2 class="font-heading text-xl font-bold text-navy mb-2">Kontaktformular</h2>
                        <p class="text-ink/70 text-sm mb-6">Ich melde mich innerhalb von 24 Stunden bei Ihnen.</p>
                        <livewire:kontakt-formular />
                    </div>

                    {{-- Direkt-Kontakt --}}
                    <div class="bg-light rounded-xl p-8">
                        <h3 class="font-heading text-lg font-bold text-navy mb-4">Direkt erreichen</h3>
                        <div class="space-y-4 text-sm">
                            <div class="flex items-start gap-3">
                                <span class="text-teal mt-0.5">📞</span>
                                <div>
                                    <p class="font-medium text-navy">Telefon</p>
                                    <a href="tel:+41555056203" class="text-ink/70 hover:text-teal transition-colors">+41 (0)55 505 62 03</a>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-teal mt-0.5">✉️</span>
                                <div>
                                    <p class="font-medium text-navy">E-Mail</p>
                                    <a href="mailto:info@bundu.ch" class="text-ink/70 hover:text-teal transition-colors">info@bundu.ch</a>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-teal mt-0.5">📍</span>
                                <div>
                                    <p class="font-medium text-navy">Adresse</p>
                                    <p class="text-ink/70">Klosterstrasse 5<br>CH-5626 Bremgarten</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 100% Online --}}
                    <div class="bg-teal/5 border border-teal/20 rounded-xl p-6">
                        <h3 class="font-heading text-base font-bold text-navy mb-2">100% Online</h3>
                        <p class="text-ink/70 text-sm">
                            Alle Beratungen finden online statt – bequem von zu Hause oder vom Arbeitsplatz.
                            Ich nutze die DSGVO-konforme Plattform <strong>coachingspace.de</strong>.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.app>
