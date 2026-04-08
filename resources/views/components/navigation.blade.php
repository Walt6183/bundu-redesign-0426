<nav x-data="{ open: false }" class="bg-white border-b border-light sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <span class="font-heading text-xl font-bold text-navy">B&U BundU</span>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex lg:items-center lg:gap-6">
                <a href="{{ url('/') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Start</a>
                <a href="{{ url('/angebote') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Angebote</a>
                <a href="{{ url('/themen') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Themen</a>
                <a href="{{ url('/fuer-eltern') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Für Eltern</a>
                <a href="{{ url('/fuer-fachpersonen') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Für Fachpersonen</a>
                <a href="{{ url('/fuer-institutionen') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Für Institutionen</a>
                <a href="{{ url('/ueber-bundu') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Über B&U</a>
                <a href="{{ url('/impulse') }}" class="text-sm font-medium text-ink hover:text-teal transition-colors">Impulse</a>
                <a href="{{ url('/kontakt') }}" class="inline-flex items-center px-4 py-2 bg-teal text-white text-sm font-medium rounded-lg hover:bg-navy transition-colors">Kontakt</a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open" class="lg:hidden p-2 rounded-md text-ink hover:bg-light focus:outline-none focus:ring-2 focus:ring-teal" aria-label="Navigation öffnen">
                <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Navigation --}}
    <div x-show="open" x-transition class="lg:hidden border-t border-light bg-white">
        <div class="px-4 py-4 space-y-2">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Start</a>
            <a href="{{ url('/angebote') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Angebote</a>
            <a href="{{ url('/themen') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Themen</a>
            <a href="{{ url('/fuer-eltern') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Für Eltern</a>
            <a href="{{ url('/fuer-fachpersonen') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Für Fachpersonen</a>
            <a href="{{ url('/fuer-institutionen') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Für Institutionen</a>
            <a href="{{ url('/ueber-bundu') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Über B&U</a>
            <a href="{{ url('/impulse') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-ink hover:bg-light">Impulse</a>
            <a href="{{ url('/kontakt') }}" class="block px-3 py-2 bg-teal text-white text-sm font-medium rounded-lg text-center">Kontakt</a>
        </div>
    </div>
</nav>
