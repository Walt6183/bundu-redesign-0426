<?php

namespace App\Filament\Pages;

use App\Models\Global_;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use App\Filament\Forms\Components\MediaPicker;
use Filament\Pages\Page;

class GlobalSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Einstellungen';
    protected static ?string $title = 'Website-Einstellungen';
    protected static ?string $slug = 'settings';
    protected static ?int $navigationSort = 100;
    protected static ?string $navigationGroup = 'Einstellungen';

    protected static string $view = 'filament.pages.global-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $global = Global_::where('key', 'site')->first();
        $content = $global?->content ?? [];

        $this->form->fill($content);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Einstellungen')
                    ->tabs([
                        // ===== TAB: ALLGEMEIN =====
                        Forms\Components\Tabs\Tab::make('Allgemein')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Forms\Components\Section::make('Website-Informationen')
                                    ->schema([
                                        Forms\Components\TextInput::make('siteName')
                                            ->label('Seitenname')
                                            ->default('B&U BundU')
                                            ->required(),
                                        Forms\Components\TextInput::make('siteTagline')
                                            ->label('Tagline')
                                            ->default('Starke Eltern – starke Kinder'),
                                        Forms\Components\Textarea::make('siteDescription')
                                            ->label('Kurzbeschreibung')
                                            ->rows(2),
                                        Forms\Components\FileUpload::make('assets.logo')
                                            ->label('Logo')
                                            ->image()
                                            ->disk('public_media')
                                            ->directory('media')
                                            ->helperText('Logo der Website (wird in Header und Footer angezeigt)'),
                                        Forms\Components\Actions::make([
                                            MediaPicker::action('assets.logo'),
                                        ]),
                                        Forms\Components\FileUpload::make('assets.portrait')
                                            ->label('Portrait-Bild')
                                            ->image()
                                            ->disk('public_media')
                                            ->directory('media')
                                            ->helperText('Portrait-Foto (z.B. für die Über-mich-Seite)'),
                                        Forms\Components\Actions::make([
                                            MediaPicker::action('assets.portrait'),
                                        ]),
                                    ])->columns(2),
                            ]),

                        // ===== TAB: KONTAKT =====
                        Forms\Components\Tabs\Tab::make('Kontakt')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Forms\Components\Section::make('Kontaktdaten')
                                    ->schema([
                                        Forms\Components\TextInput::make('contact.email')
                                            ->label('E-Mail')
                                            ->email()
                                            ->default('info@bundu.ch'),
                                        Forms\Components\TextInput::make('contact.phone')
                                            ->label('Telefon')
                                            ->default('+41 (0)55 505 62 03'),
                                        Forms\Components\TextInput::make('contact.phoneClean')
                                            ->label('Telefon (numerisch)')
                                            ->default('+41555056203')
                                            ->helperText('Für tel:-Links, nur Zahlen und +'),
                                    ])->columns(2),
                                Forms\Components\Section::make('Adresse')
                                    ->schema([
                                        Forms\Components\TextInput::make('contact.address.name')
                                            ->label('Firmenname')
                                            ->default('B&U BundU'),
                                        Forms\Components\TextInput::make('contact.address.street')
                                            ->label('Strasse')
                                            ->default('Klosterstrasse 5'),
                                        Forms\Components\TextInput::make('contact.address.city')
                                            ->label('PLZ & Ort')
                                            ->default('CH-5626 Bremgarten'),
                                    ])->columns(3),
                            ]),

                        // ===== TAB: INHABER =====
                        Forms\Components\Tabs\Tab::make('Inhaber')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Forms\Components\Section::make('Persönliche Informationen')
                                    ->schema([
                                        Forms\Components\TextInput::make('owner.name')
                                            ->label('Name')
                                            ->default('Walter Uehli'),
                                        Forms\Components\TextInput::make('owner.role')
                                            ->label('Rolle / Titel')
                                            ->default('Inhaber'),
                                        Forms\Components\Textarea::make('owner.bio')
                                            ->label('Biografie')
                                            ->rows(5)
                                            ->columnSpanFull(),
                                        Forms\Components\Repeater::make('owner.expertise')
                                            ->label('Fachgebiete')
                                            ->simple(
                                                Forms\Components\TextInput::make('value')
                                                    ->label('Fachgebiet')
                                                    ->required()
                                            )
                                            ->defaultItems(4)
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        // ===== TAB: NAVIGATION =====
                        Forms\Components\Tabs\Tab::make('Navigation')
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                Forms\Components\Section::make('Hauptnavigation')
                                    ->schema([
                                        Forms\Components\Repeater::make('navigation.main')
                                            ->label('Menüpunkte')
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Bezeichnung')
                                                    ->required(),
                                                Forms\Components\TextInput::make('href')
                                                    ->label('Link')
                                                    ->required(),
                                                Forms\Components\Repeater::make('dropdown')
                                                    ->label('Untermenü (optional)')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('name')
                                                            ->label('Bezeichnung')
                                                            ->required(),
                                                        Forms\Components\TextInput::make('href')
                                                            ->label('Link')
                                                            ->required(),
                                                    ])
                                                    ->columns(2)
                                                    ->collapsible()
                                                    ->collapsed()
                                                    ->defaultItems(0),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Section::make('Footer-Links')
                                    ->schema([
                                        Forms\Components\Repeater::make('navigation.footer')
                                            ->label('Footer Quick-Links')
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Bezeichnung')
                                                    ->required(),
                                                Forms\Components\TextInput::make('href')
                                                    ->label('Link')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                        Forms\Components\Repeater::make('navigation.legal')
                                            ->label('Rechtliche Links')
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->label('Bezeichnung')
                                                    ->required(),
                                                Forms\Components\TextInput::make('href')
                                                    ->label('Link')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // ===== TAB: FOOTER =====
                        Forms\Components\Tabs\Tab::make('Footer')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\Section::make('Footer-Inhalte')
                                    ->schema([
                                        Forms\Components\Textarea::make('footerText')
                                            ->label('Footer-Text / Tagline')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('copyright')
                                            ->label('Copyright-Text')
                                            ->default('© 2025 B&U BundU. Alle Rechte vorbehalten.'),
                                    ]),
                            ]),

                        // ===== TAB: STATISTIKEN =====
                        Forms\Components\Tabs\Tab::make('Statistiken')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Forms\Components\Section::make('Kennzahlen (Über-mich-Seite)')
                                    ->schema([
                                        Forms\Components\TextInput::make('stats.yearsExperience')
                                            ->label('Jahre Erfahrung')
                                            ->default('20+'),
                                        Forms\Components\TextInput::make('stats.familiesSupported')
                                            ->label('Unterstützte Familien')
                                            ->default('50+'),
                                        Forms\Components\TextInput::make('stats.institutions')
                                            ->label('Institutionen')
                                            ->default('10+'),
                                        Forms\Components\TextInput::make('stats.ownConcepts')
                                            ->label('Eigene Konzepte')
                                            ->default('5+'),
                                    ])->columns(4),
                            ]),

                        // ===== TAB: EXTERNE DIENSTE =====
                        Forms\Components\Tabs\Tab::make('Externe Dienste')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Forms\Components\Section::make('Buchung & Kalender')
                                    ->schema([
                                        Forms\Components\TextInput::make('externalLinks.bookingUrl')
                                            ->label('Google Calendar Buchungs-URL')
                                            ->url()
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('externalLinks.bookingIframe')
                                            ->label('Google Calendar Embed-URL (iframe)')
                                            ->url()
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Section::make('Formulare & Newsletter')
                                    ->schema([
                                        Forms\Components\TextInput::make('externalLinks.formspreeUrl')
                                            ->label('Formspree URL (Fallback)')
                                            ->helperText('Wird nur als Fallback verwendet. Primär läuft das Kontaktformular über SMTP.'),
                                        Forms\Components\TextInput::make('externalLinks.newsletterIframe')
                                            ->label('KlickTipp Newsletter Embed-URL')
                                            ->url(),
                                    ])->columns(2),
                                Forms\Components\Section::make('Podcast & Datenschutz')
                                    ->schema([
                                        Forms\Components\TextInput::make('externalLinks.podcastScript')
                                            ->label('Podcast Embed Script-URL')
                                            ->url(),
                                        Forms\Components\TextInput::make('externalLinks.privacyBeeWidgetId')
                                            ->label('PrivacyBee Widget-ID'),
                                        Forms\Components\TextInput::make('externalLinks.disqusShortname')
                                            ->label('Disqus Shortname (Blog-Kommentare)')
                                            ->helperText('Optional: Kommentarfunktion für Blog-Posts'),
                                    ])->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Handle expertise array (Filament Repeater with simple() returns nested arrays)
        if (isset($data['owner']['expertise']) && is_array($data['owner']['expertise'])) {
            $data['owner']['expertise'] = array_values(array_filter(
                array_map(fn($item) => is_array($item) ? ($item['value'] ?? $item) : $item, $data['owner']['expertise'])
            ));
        }

        Global_::updateOrCreate(
            ['key' => 'site'],
            ['content' => $data]
        );

        Notification::make()
            ->title('Einstellungen gespeichert')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Speichern')
                ->action('save')
                ->color('primary')
                ->icon('heroicon-o-check'),
        ];
    }
}
