<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $navigationLabel = 'Passwort ändern';
    protected static ?string $title = 'Passwort ändern';
    protected static ?string $navigationGroup = 'Einstellungen';
    protected static ?int $navigationSort = 99;

    protected static string $view = 'filament.pages.change-password';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Passwort ändern')
                    ->description('Geben Sie Ihr aktuelles Passwort ein und wählen Sie ein neues.')
                    ->schema([
                        Forms\Components\TextInput::make('current_password')
                            ->label('Aktuelles Passwort')
                            ->password()
                            ->revealable()
                            ->required()
                            ->autocomplete('current-password'),
                        Forms\Components\TextInput::make('new_password')
                            ->label('Neues Passwort')
                            ->password()
                            ->revealable()
                            ->required()
                            ->minLength(8)
                            ->autocomplete('new-password'),
                        Forms\Components\TextInput::make('new_password_confirmation')
                            ->label('Neues Passwort bestätigen')
                            ->password()
                            ->revealable()
                            ->required()
                            ->same('new_password')
                            ->validationMessages([
                                'same' => 'Die Passwörter stimmen nicht überein.',
                            ])
                            ->autocomplete('new-password'),
                    ])
                    ->columns(1),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $user = Auth::user();

        if (!Hash::check($data['current_password'], $user->password)) {
            $this->addError('data.current_password', 'Das aktuelle Passwort ist nicht korrekt.');
            return;
        }

        $user->update([
            'password' => Hash::make($data['new_password']),
        ]);

        $this->form->fill();

        Notification::make()
            ->title('Passwort erfolgreich geändert!')
            ->success()
            ->send();
    }
}
