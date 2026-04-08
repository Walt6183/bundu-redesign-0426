<?php

namespace App\Livewire;

use App\Models\KontaktAnfrage;
use Livewire\Component;

class KontaktFormular extends Component
{
    public string $name = '';
    public string $email = '';
    public string $ich_bin = '';
    public string $institution = '';
    public string $betreff = '';
    public string $nachricht = '';
    public bool $datenschutz_akzeptiert = false;

    // Honeypot – must remain empty
    public string $website = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'ich_bin' => 'required|in:eltern,fachperson,institution,andere',
            'institution' => 'nullable|string|max:150',
            'betreff' => 'required|string|max:200',
            'nachricht' => 'required|string|max:5000',
            'datenschutz_akzeptiert' => 'accepted',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Bitte geben Sie Ihren Namen ein.',
            'email.required' => 'Bitte geben Sie Ihre E-Mail-Adresse ein.',
            'email.email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'ich_bin.required' => 'Bitte wählen Sie eine Option.',
            'betreff.required' => 'Bitte geben Sie einen Betreff ein.',
            'nachricht.required' => 'Bitte geben Sie eine Nachricht ein.',
            'datenschutz_akzeptiert.accepted' => 'Bitte akzeptieren Sie die Datenschutzbestimmungen.',
        ];
    }

    public function submit(): void
    {
        // Honeypot check – bots fill this hidden field
        if ($this->website !== '') {
            // Silently reject
            $this->reset();
            session()->flash('success', 'Vielen Dank für Ihre Nachricht! Ich melde mich innerhalb von 24 Stunden.');
            return;
        }

        $validated = $this->validate();

        KontaktAnfrage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'ich_bin' => $validated['ich_bin'],
            'institution' => $validated['institution'] ?? null,
            'betreff' => $validated['betreff'],
            'nachricht' => $validated['nachricht'],
            'datenschutz_akzeptiert' => true,
            'status' => 'neu',
        ]);

        $this->reset();
        session()->flash('success', 'Vielen Dank für Ihre Nachricht! Ich melde mich innerhalb von 24 Stunden.');
    }

    public function render()
    {
        return view('livewire.kontakt-formular');
    }
}
