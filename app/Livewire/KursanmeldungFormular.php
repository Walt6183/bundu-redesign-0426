<?php

namespace App\Livewire;

use App\Models\Angebot;
use App\Models\Kursanmeldung;
use Livewire\Component;

class KursanmeldungFormular extends Component
{
    public ?int $angebotId = null;
    public string $kurstermin = '';
    public int $teilnehmer_anzahl = 6;
    public string $institution = '';
    public string $kontaktperson = '';
    public string $kontakt_email = '';
    public string $bemerkungen = '';

    // Honeypot
    public string $fax = '';

    public function mount(?int $angebotId = null): void
    {
        $this->angebotId = $angebotId;
    }

    protected function rules(): array
    {
        return [
            'angebotId' => 'nullable|exists:angebote,id',
            'kurstermin' => 'required|string|max:100',
            'teilnehmer_anzahl' => 'required|integer|min:1|max:50',
            'institution' => 'required|string|max:150',
            'kontaktperson' => 'required|string|max:100',
            'kontakt_email' => 'required|email|max:150',
            'bemerkungen' => 'nullable|string|max:2000',
        ];
    }

    protected function messages(): array
    {
        return [
            'kurstermin.required' => 'Bitte geben Sie den gewünschten Termin an.',
            'teilnehmer_anzahl.required' => 'Bitte geben Sie die Teilnehmerzahl an.',
            'teilnehmer_anzahl.min' => 'Mindestens 1 Teilnehmer.',
            'institution.required' => 'Bitte geben Sie die Institution an.',
            'kontaktperson.required' => 'Bitte geben Sie eine Ansprechperson an.',
            'kontakt_email.required' => 'Bitte geben Sie eine E-Mail-Adresse an.',
            'kontakt_email.email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
        ];
    }

    public function submit(): void
    {
        if ($this->fax !== '') {
            $this->reset();
            session()->flash('success', 'Vielen Dank für Ihre Anmeldung! Wir melden uns in Kürze.');
            return;
        }

        $validated = $this->validate();

        Kursanmeldung::create([
            'angebot_id' => $validated['angebotId'],
            'kurstermin' => $validated['kurstermin'],
            'teilnehmer_anzahl' => $validated['teilnehmer_anzahl'],
            'institution' => $validated['institution'],
            'kontaktperson' => $validated['kontaktperson'],
            'kontakt_email' => $validated['kontakt_email'],
            'bemerkungen' => $validated['bemerkungen'] ?? null,
            'status' => 'ausstehend',
        ]);

        $this->reset(['kurstermin', 'teilnehmer_anzahl', 'institution', 'kontaktperson', 'kontakt_email', 'bemerkungen']);
        session()->flash('success', 'Vielen Dank für Ihre Kursanmeldung! Wir melden uns in Kürze bei Ihnen.');
    }

    public function render()
    {
        $angebote = Angebot::where('aktiv', true)->orderBy('titel')->pluck('titel', 'id');

        return view('livewire.kursanmeldung-formular', compact('angebote'));
    }
}
