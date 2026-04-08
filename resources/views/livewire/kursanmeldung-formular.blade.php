<div>
    @if (session('success'))
        <div class="bg-teal/10 border border-teal/30 text-teal rounded-lg p-4 mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="submit" class="space-y-6">
        {{-- Honeypot --}}
        <div class="hidden" aria-hidden="true">
            <label for="fax">Fax</label>
            <input type="text" id="fax" wire:model="fax" tabindex="-1" autocomplete="off">
        </div>

        {{-- Angebot (vorausgewählt oder auswählbar) --}}
        <div>
            <label for="angebotId" class="block text-sm font-medium text-navy mb-1">Kurs / Angebot</label>
            <select
                id="angebotId"
                wire:model="angebotId"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors bg-white"
            >
                <option value="">Bitte wählen…</option>
                @foreach($angebote as $id => $titel)
                    <option value="{{ $id }}">{{ $titel }}</option>
                @endforeach
            </select>
        </div>

        {{-- Gewünschter Termin --}}
        <div>
            <label for="kurstermin" class="block text-sm font-medium text-navy mb-1">Gewünschter Termin <span class="text-red-500">*</span></label>
            <input
                type="text"
                id="kurstermin"
                wire:model="kurstermin"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="z.B. September 2026 oder flexibel"
            >
            @error('kurstermin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Teilnehmerzahl --}}
        <div>
            <label for="teilnehmer_anzahl" class="block text-sm font-medium text-navy mb-1">Anzahl Teilnehmende <span class="text-red-500">*</span></label>
            <input
                type="number"
                id="teilnehmer_anzahl"
                wire:model="teilnehmer_anzahl"
                min="1"
                max="50"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
            >
            <p class="text-xs text-ink/50 mt-1">Hinweis: Mindestens 6, maximal 18 Teilnehmende pro Kurs.</p>
            @error('teilnehmer_anzahl') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Institution --}}
        <div>
            <label for="institution" class="block text-sm font-medium text-navy mb-1">Institution <span class="text-red-500">*</span></label>
            <input
                type="text"
                id="institution"
                wire:model="institution"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="Name Ihrer Institution"
            >
            @error('institution') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Ansprechperson --}}
        <div>
            <label for="kontaktperson" class="block text-sm font-medium text-navy mb-1">Ansprechperson <span class="text-red-500">*</span></label>
            <input
                type="text"
                id="kontaktperson"
                wire:model="kontaktperson"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="Ihr Name"
            >
            @error('kontaktperson') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- E-Mail --}}
        <div>
            <label for="kontakt_email" class="block text-sm font-medium text-navy mb-1">E-Mail <span class="text-red-500">*</span></label>
            <input
                type="email"
                id="kontakt_email"
                wire:model="kontakt_email"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="ihre@institution.ch"
            >
            @error('kontakt_email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Bemerkungen --}}
        <div>
            <label for="bemerkungen" class="block text-sm font-medium text-navy mb-1">Bemerkungen <span class="text-ink/40">(optional)</span></label>
            <textarea
                id="bemerkungen"
                wire:model="bemerkungen"
                rows="3"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors resize-y"
                placeholder="Spezielle Wünsche oder Fragen…"
            ></textarea>
        </div>

        {{-- Submit --}}
        <div>
            <button
                type="submit"
                class="w-full sm:w-auto px-8 py-3 bg-teal text-white font-medium rounded-lg hover:bg-navy transition-colors focus:outline-none focus:ring-2 focus:ring-teal/50"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-wait"
            >
                <span wire:loading.remove>Kursanmeldung absenden</span>
                <span wire:loading>Wird gesendet…</span>
            </button>
        </div>
    </form>
</div>
