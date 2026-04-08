<footer class="bg-navy text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Spalte 1: Marke --}}
            <div class="md:col-span-1">
                <span class="font-heading text-xl font-bold">B&U BundU</span>
                <p class="mt-3 text-sm text-white/70">
                    Systemische Beratung, Neue Autorität und Coaching – individuell, empathisch und lösungsorientiert.
                </p>
            </div>

            {{-- Spalte 2: Angebote --}}
            <div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">Angebote</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="{{ url('/angebote/online-kurse') }}" class="hover:text-teal transition-colors">Online-Kurse</a></li>
                    <li><a href="{{ url('/angebote/elternberatung') }}" class="hover:text-teal transition-colors">Elternberatung</a></li>
                    <li><a href="{{ url('/angebote/coaching') }}" class="hover:text-teal transition-colors">Coaching</a></li>
                    <li><a href="{{ url('/angebote/supervision') }}" class="hover:text-teal transition-colors">Supervision</a></li>
                    <li><a href="{{ url('/angebote/inhouse-fortbildungen') }}" class="hover:text-teal transition-colors">Inhouse-Fortbildungen</a></li>
                </ul>
            </div>

            {{-- Spalte 3: Über B&U --}}
            <div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">Über B&U</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="{{ url('/ueber-bundu/mission-und-haltung') }}" class="hover:text-teal transition-colors">Mission & Haltung</a></li>
                    <li><a href="{{ url('/ueber-bundu/walter-uehli') }}" class="hover:text-teal transition-colors">Walter Uehli</a></li>
                    <li><a href="{{ url('/impulse') }}" class="hover:text-teal transition-colors">Impulse</a></li>
                    <li><a href="{{ url('/faq') }}" class="hover:text-teal transition-colors">FAQ</a></li>
                </ul>
            </div>

            {{-- Spalte 4: Kontakt --}}
            <div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">Kontakt</h3>
                <address class="not-italic text-sm text-white/70 space-y-2">
                    <p>Klosterstrasse 5<br>CH-5626 Bremgarten</p>
                    <p><a href="tel:+41555056203" class="hover:text-teal transition-colors">+41 (0)55 505 62 03</a></p>
                    <p><a href="mailto:info@bundu.ch" class="hover:text-teal transition-colors">info@bundu.ch</a></p>
                </address>
            </div>
        </div>

        {{-- Untere Leiste --}}
        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-white/50">
            <p>&copy; {{ date('Y') }} B&U BundU. Alle Rechte vorbehalten.</p>
            <div class="flex gap-4">
                <a href="{{ url('/impressum') }}" class="hover:text-white transition-colors">Impressum</a>
                <a href="{{ url('/datenschutz') }}" class="hover:text-white transition-colors">Datenschutz</a>
            </div>
        </div>
    </div>
</footer>
