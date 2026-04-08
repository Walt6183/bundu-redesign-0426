<x-layouts.app
    :metaTitle="'Kontakt'"
    :metaDescription="'Kontaktieren Sie B&U BundU – kostenloses Erstgespräch, Beratungsanfrage oder allgemeine Fragen. Ich melde mich innerhalb von 24 Stunden.'"
>
    {{-- Hero --}}
    <x-hero
        title="Kontakt"
        subtitle="Ich freue mich auf Ihre Nachricht. Lassen Sie uns gemeinsam den passenden Weg finden."
        bgColor="bg-navy"
    />

    {{-- Kontakt-Bereich --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

                {{-- Formular (3/5) --}}
                <div class="lg:col-span-3">
                    <h2 class="font-heading text-xl font-bold text-navy mb-6">Kontaktformular</h2>
                    <p class="text-ink/70 mb-8">Ich melde mich innerhalb von 24 Stunden bei Ihnen.</p>
                    <livewire:kontakt-formular />
                </div>

                {{-- Sidebar (2/5) --}}
                <div class="lg:col-span-2 space-y-8">

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

                    {{-- Erstgespräch-Box --}}
                    <div class="bg-navy text-white rounded-xl p-8">
                        <h3 class="font-heading text-lg font-bold mb-3">Kostenloses Erstgespräch</h3>
                        <p class="text-white/70 text-sm mb-4">
                            30 Minuten, online, unverbindlich. Wir klären Ihr Anliegen und finden das passende Angebot.
                        </p>
                        <p class="text-white/50 text-xs">
                            Tipp: Wählen Sie im Formular als Betreff «Erstgespräch» – ich schlage dann passende Termine vor.
                        </p>
                    </div>

                    {{-- 100% Online --}}
                    <div class="bg-teal/5 border border-teal/20 rounded-xl p-8">
                        <h3 class="font-heading text-lg font-bold text-navy mb-3">100% Online</h3>
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
