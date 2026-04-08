<div>
    @if (session('success'))
        <div class="bg-teal/10 border border-teal/30 text-teal rounded-lg p-4 mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="submit" class="space-y-6">
        {{-- Honeypot (hidden from users, visible to bots) --}}
        <div class="hidden" aria-hidden="true">
            <label for="website">Website</label>
            <input type="text" id="website" wire:model="website" tabindex="-1" autocomplete="off">
        </div>

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-navy mb-1">Name <span class="text-red-500">*</span></label>
            <input
                type="text"
                id="name"
                wire:model="name"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="Ihr vollständiger Name"
            >
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- E-Mail --}}
        <div>
            <label for="email" class="block text-sm font-medium text-navy mb-1">E-Mail <span class="text-red-500">*</span></label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="ihre@email.ch"
            >
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Ich bin --}}
        <div>
            <label for="ich_bin" class="block text-sm font-medium text-navy mb-1">Ich bin <span class="text-red-500">*</span></label>
            <select
                id="ich_bin"
                wire:model="ich_bin"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors bg-white"
            >
                <option value="">Bitte wählen…</option>
                <option value="eltern">Elternteil / Erziehungsberechtigte:r</option>
                <option value="fachperson">Fachperson</option>
                <option value="institution">Institution / Organisation</option>
                <option value="andere">Andere</option>
            </select>
            @error('ich_bin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Institution (optional) --}}
        <div>
            <label for="institution" class="block text-sm font-medium text-navy mb-1">Institution <span class="text-ink/40">(optional)</span></label>
            <input
                type="text"
                id="institution"
                wire:model="institution"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="Name der Institution"
            >
        </div>

        {{-- Betreff --}}
        <div>
            <label for="betreff" class="block text-sm font-medium text-navy mb-1">Betreff <span class="text-red-500">*</span></label>
            <input
                type="text"
                id="betreff"
                wire:model="betreff"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors"
                placeholder="Worum geht es?"
            >
            @error('betreff') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Nachricht --}}
        <div>
            <label for="nachricht" class="block text-sm font-medium text-navy mb-1">Nachricht <span class="text-red-500">*</span></label>
            <textarea
                id="nachricht"
                wire:model="nachricht"
                rows="5"
                class="w-full px-4 py-3 rounded-lg border border-ink/20 focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-colors resize-y"
                placeholder="Ihre Nachricht…"
            ></textarea>
            @error('nachricht') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Datenschutz --}}
        <div>
            <label class="flex items-start gap-3 cursor-pointer">
                <input
                    type="checkbox"
                    wire:model="datenschutz_akzeptiert"
                    class="mt-1 rounded border-ink/20 text-teal focus:ring-teal/20"
                >
                <span class="text-sm text-ink/70">
                    Ich habe die <a href="{{ url('/datenschutz') }}" target="_blank" class="text-teal underline hover:text-navy">Datenschutzbestimmungen</a> gelesen und akzeptiere diese. <span class="text-red-500">*</span>
                </span>
            </label>
            @error('datenschutz_akzeptiert') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div>
            <button
                type="submit"
                class="w-full sm:w-auto px-8 py-3 bg-teal text-white font-medium rounded-lg hover:bg-navy transition-colors focus:outline-none focus:ring-2 focus:ring-teal/50"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-wait"
            >
                <span wire:loading.remove>Nachricht senden</span>
                <span wire:loading>Wird gesendet…</span>
            </button>
        </div>
    </form>
</div>
