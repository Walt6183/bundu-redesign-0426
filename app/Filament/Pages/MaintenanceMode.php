<?php

namespace App\Filament\Pages;

use App\Models\MaintenanceSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class MaintenanceMode extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Wartungsmodus';
    protected static ?string $title = 'Wartungsmodus';
    protected static ?string $slug = 'maintenance';
    protected static ?int $navigationSort = 99;
    protected static ?string $navigationGroup = 'Einstellungen';

    protected static string $view = 'filament.pages.maintenance-mode';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = MaintenanceSetting::current();

        $this->form->fill([
            'enabled' => $setting->enabled,
            'mode' => $setting->mode,
            'countdown_target' => $setting->countdown_target?->format('Y-m-d\TH:i'),
            'headline' => $setting->headline,
            'message' => $setting->message,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Wartungsmodus aktivieren')
                    ->description('Wenn aktiviert, sehen Besucher eine Wartungsseite. Admins haben weiterhin Zugriff auf Frontend und Backend.')
                    ->schema([
                        Forms\Components\Toggle::make('enabled')
                            ->label('Wartungsmodus aktiv')
                            ->helperText('Frontend wird für normale Besucher gesperrt')
                            ->live(),

                        Forms\Components\Select::make('mode')
                            ->label('Modus')
                            ->options([
                                'maintenance' => '🔧 Klassische Wartungsseite',
                                'countdown' => '⏱️ Countdown bis Relaunch',
                            ])
                            ->required()
                            ->live(),

                        Forms\Components\DateTimePicker::make('countdown_target')
                            ->label('Countdown-Ziel')
                            ->helperText('Datum und Uhrzeit, bis wann der Countdown läuft')
                            ->seconds(false)
                            ->native(false)
                            ->visible(fn (Get $get) => $get('mode') === 'countdown')
                            ->required(fn (Get $get) => $get('mode') === 'countdown'),
                    ])->columns(1),

                Forms\Components\Section::make('Texte')
                    ->schema([
                        Forms\Components\TextInput::make('headline')
                            ->label('Überschrift')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Wir sind bald zurück'),

                        Forms\Components\Textarea::make('message')
                            ->label('Nachricht')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Unsere Website wird gerade überarbeitet...'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $setting = MaintenanceSetting::current();

        $setting->update([
            'enabled' => $data['enabled'] ?? false,
            'mode' => $data['mode'],
            'countdown_target' => $data['mode'] === 'countdown' ? $data['countdown_target'] : null,
            'headline' => $data['headline'],
            'message' => $data['message'],
        ]);

        Notification::make()
            ->title($data['enabled'] ? 'Wartungsmodus aktiviert' : 'Wartungsmodus deaktiviert')
            ->icon($data['enabled'] ? 'heroicon-o-wrench-screwdriver' : 'heroicon-o-check-circle')
            ->color($data['enabled'] ? 'warning' : 'success')
            ->send();
    }

    public static function getNavigationBadge(): ?string
    {
        $setting = MaintenanceSetting::first();
        return $setting?->enabled ? 'AKTIV' : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
