@php $d = $data; @endphp

<x-section>
    <div class="max-w-4xl mx-auto">
        @if(!empty($d['title']))
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-navy mb-2 text-center">
                {{ $d['title'] }}
                @if(!empty($d['titleHighlight']))
                    <span class="text-teal">{{ $d['titleHighlight'] }}</span>
                @endif
            </h2>
        @endif
        @if(!empty($d['subtitle']))
            <p class="text-ink/70 text-center mb-10">{{ $d['subtitle'] }}</p>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Kontaktformular --}}
            <div>
                @livewire('kontakt-formular')
            </div>

            {{-- Kontaktinfos --}}
            <div class="space-y-6">
                @if(!empty($d['recipientEmail']))
                    <p class="text-ink/60 text-sm">Ihre Nachricht geht an: {{ $d['recipientEmail'] }}</p>
                @endif
            </div>
        </div>
    </div>
</x-section>
