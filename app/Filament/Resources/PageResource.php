<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Filament\Forms\Components\MediaPicker;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationLabel = 'Seiten';
    protected static ?string $modelLabel = 'Seite';
    protected static ?string $pluralModelLabel = 'Seiten';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Seiten-Informationen')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Seitentitel')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('URL-Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('z.B. "home", "about", "services"')
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Veröffentlicht')
                            ->default(true),
                    ])->columns(3),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('seo_title')
                            ->label('SEO Titel')
                            ->maxLength(70)
                            ->helperText('Max. 70 Zeichen für Suchmaschinen'),
                        Forms\Components\Textarea::make('seo_description')
                            ->label('SEO Beschreibung')
                            ->maxLength(160)
                            ->rows(2)
                            ->helperText('Max. 160 Zeichen für Suchmaschinen'),
                    ])->columns(2)->collapsible()->collapsed(),

                Forms\Components\Section::make('Seiteninhalte (Blöcke)')
                    ->schema([
                        Forms\Components\Builder::make('blocks')
                            ->label('')
                            ->blocks([
                                // ===== HERO BLOCK =====
                                Forms\Components\Builder\Block::make('hero')
                                    ->label('Hero-Bereich')
                                    ->icon('heroicon-o-sparkles')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Titel')
                                            ->required(),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Titel-Hervorhebung (gelb)')
                                            ->helperText('Wird farblich hervorgehoben'),
                                        Forms\Components\Textarea::make('subtitle')
                                            ->label('Untertitel')
                                            ->rows(2),
                                        Forms\Components\FileUpload::make('backgroundImage')
                                            ->label('Hintergrundbild')
                                            ->image()
                                            ->disk('public_media')
                                            ->directory('media/heroes'),
                                        Forms\Components\Actions::make([
                                            MediaPicker::action('backgroundImage'),
                                        ]),
                                        Forms\Components\Repeater::make('badges')
                                            ->label('Badges / Schlagworte')
                                            ->simple(
                                                Forms\Components\TextInput::make('text')
                                                    ->label('Badge-Text')
                                                    ->required()
                                            )
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->collapsed(),
                                        Forms\Components\Repeater::make('buttons')
                                            ->label('CTA-Buttons')
                                            ->schema([
                                                Forms\Components\TextInput::make('label')
                                                    ->label('Button-Text')
                                                    ->required(),
                                                Forms\Components\TextInput::make('href')
                                                    ->label('Link')
                                                    ->required(),
                                                Forms\Components\Select::make('style')
                                                    ->label('Stil')
                                                    ->options([
                                                        'primary' => 'Primär (Rot)',
                                                        'secondary' => 'Sekundär (Weiss/Transparent)',
                                                    ])
                                                    ->default('primary'),
                                                Forms\Components\Toggle::make('isExternal')
                                                    ->label('Externer Link')
                                                    ->default(false),
                                            ])
                                            ->columns(2)
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->collapsed(),
                                    ]),

                                // ===== FEATURES BLOCK =====
                                Forms\Components\Builder\Block::make('features')
                                    ->label('Features / Merkmale')
                                    ->icon('heroicon-o-star')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung (gelb)'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Feature-Einträge')
                                            ->schema([
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name')
                                                    ->helperText('z.B. Shield, Heart, Users, BookOpen (Feather Icons ohne Fi-Prefix)'),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== SERVICES OVERVIEW BLOCK =====
                                Forms\Components\Builder\Block::make('services_overview')
                                    ->label('Leistungen-Übersicht')
                                    ->icon('heroicon-o-briefcase')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Leistungen')
                                            ->schema([
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name'),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('href')
                                                    ->label('Link'),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== SERVICES AUTO BLOCK =====
                                Forms\Components\Builder\Block::make('services_auto')
                                    ->label('Angebote aus DB (automatisch)')
                                    ->icon('heroicon-o-rectangle-stack')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift')
                                            ->default('Meine Angebote'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\TextInput::make('limit')
                                            ->label('Anzahl Angebote')
                                            ->numeric()
                                            ->default(3),
                                        Forms\Components\TextInput::make('ctaText')
                                            ->label('CTA-Button Text')
                                            ->default('Alle Angebote ansehen'),
                                        Forms\Components\TextInput::make('ctaUrl')
                                            ->label('CTA-Button Link')
                                            ->default('/angebote'),
                                    ]),

                                // ===== SERVICE DETAIL BLOCK =====
                                Forms\Components\Builder\Block::make('service_detail')
                                    ->label('Leistung (Detail)')
                                    ->icon('heroicon-o-clipboard-document-list')
                                    ->schema([
                                        Forms\Components\TextInput::make('id')
                                            ->label('ID')
                                            ->required(),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Titel')
                                            ->required(),
                                        Forms\Components\TextInput::make('icon')
                                            ->label('Icon-Name'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\RichEditor::make('description')
                                            ->label('Beschreibung')
                                            ->columnSpanFull(),
                                        Forms\Components\Repeater::make('features')
                                            ->label('Merkmale / Aufzählung')
                                            ->simple(
                                                Forms\Components\TextInput::make('text')
                                                    ->label('Merkmal')
                                                    ->required()
                                            )
                                            ->defaultItems(0),
                                        Forms\Components\TextInput::make('duration')
                                            ->label('Dauer'),
                                        Forms\Components\TextInput::make('location')
                                            ->label('Ort'),
                                        Forms\Components\TextInput::make('price')
                                            ->label('Preis'),
                                        Forms\Components\TextInput::make('buttonText')
                                            ->label('Button-Text'),
                                        Forms\Components\TextInput::make('buttonLink')
                                            ->label('Button-Link'),
                                        Forms\Components\Toggle::make('isExternal')
                                            ->label('Externer Link'),
                                    ])->columns(2),

                                // ===== COURSES BLOCK =====
                                Forms\Components\Builder\Block::make('courses')
                                    ->label('Kurse')
                                    ->icon('heroicon-o-academic-cap')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Kurs-Einträge')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Kurstitel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(3),
                                                Forms\Components\TextInput::make('price')
                                                    ->label('Preis'),
                                                Forms\Components\TextInput::make('infoText')
                                                    ->label('Info-Text'),
                                                Forms\Components\TextInput::make('duration')
                                                    ->label('Dauer'),
                                                Forms\Components\TextInput::make('location')
                                                    ->label('Ort'),
                                                Forms\Components\TextInput::make('maxParticipants')
                                                    ->label('Max. Teilnehmer'),
                                                Forms\Components\TextInput::make('bookingUrl')
                                                    ->label('Buchungs-URL'),
                                                Forms\Components\Toggle::make('isFullyBooked')
                                                    ->label('Ausgebucht'),
                                                Forms\Components\Toggle::make('isExternal')
                                                    ->label('Externer Link'),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                        Forms\Components\Repeater::make('testimonials')
                                            ->label('Erfahrungsberichte')
                                            ->schema([
                                                Forms\Components\Textarea::make('quote')
                                                    ->label('Zitat')
                                                    ->rows(2)
                                                    ->required(),
                                                Forms\Components\TextInput::make('author')
                                                    ->label('Autor')
                                                    ->required(),
                                                Forms\Components\TextInput::make('role')
                                                    ->label('Rolle / Kontext'),
                                            ])
                                            ->collapsible()
                                            ->collapsed()
                                            ->defaultItems(0),
                                        Forms\Components\Repeater::make('benefits')
                                            ->label('Vorteile')
                                            ->schema([
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name'),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                            ])
                                            ->collapsible()
                                            ->collapsed()
                                            ->defaultItems(0),
                                    ]),

                                // ===== PROCESS STEPS BLOCK =====
                                Forms\Components\Builder\Block::make('process_steps')
                                    ->label('Prozess-Schritte')
                                    ->icon('heroicon-o-arrow-path')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\Repeater::make('steps')
                                            ->label('Schritte')
                                            ->schema([
                                                Forms\Components\TextInput::make('number')
                                                    ->label('Nummer')
                                                    ->numeric(),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name'),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== CTA BLOCK =====
                                Forms\Components\Builder\Block::make('cta')
                                    ->label('Call-to-Action')
                                    ->icon('heroicon-o-megaphone')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Titel'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Titel-Hervorhebung'),
                                        Forms\Components\Textarea::make('subtitle')
                                            ->label('Untertitel')
                                            ->rows(2),
                                        Forms\Components\Repeater::make('buttons')
                                            ->label('Buttons')
                                            ->schema([
                                                Forms\Components\TextInput::make('label')
                                                    ->label('Button-Text')
                                                    ->required(),
                                                Forms\Components\TextInput::make('href')
                                                    ->label('Link')
                                                    ->required(),
                                                Forms\Components\Select::make('style')
                                                    ->label('Stil')
                                                    ->options([
                                                        'primary' => 'Primär (Rot)',
                                                        'secondary' => 'Sekundär (Weiss)',
                                                    ])
                                                    ->default('primary'),
                                            ])
                                            ->columns(3)
                                            ->defaultItems(0),
                                    ]),

                                // ===== TEXT CONTENT BLOCK =====
                                Forms\Components\Builder\Block::make('text_content')
                                    ->label('Text-Inhalt')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Inhalt')
                                            ->columnSpanFull(),
                                        Forms\Components\Select::make('layout')
                                            ->label('Layout')
                                            ->options([
                                                'full' => 'Volle Breite',
                                                'split' => 'Zweispaltig',
                                            ])
                                            ->default('full'),
                                    ]),

                                // ===== STATS BLOCK =====
                                Forms\Components\Builder\Block::make('stats')
                                    ->label('Statistiken / Zahlen')
                                    ->icon('heroicon-o-chart-bar')
                                    ->schema([
                                        Forms\Components\Repeater::make('items')
                                            ->label('Statistik-Einträge')
                                            ->schema([
                                                Forms\Components\TextInput::make('number')
                                                    ->label('Zahl')
                                                    ->required(),
                                                Forms\Components\TextInput::make('suffix')
                                                    ->label('Suffix (z.B. +, %)'),
                                                Forms\Components\TextInput::make('label')
                                                    ->label('Beschriftung')
                                                    ->required(),
                                            ])
                                            ->columns(3)
                                            ->defaultItems(0),
                                    ]),

                                // ===== VALUES BLOCK =====
                                Forms\Components\Builder\Block::make('values')
                                    ->label('Werte / Prinzipien')
                                    ->icon('heroicon-o-heart')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Werte')
                                            ->schema([
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name'),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== ABOUT PERSON BLOCK =====
                                Forms\Components\Builder\Block::make('about_person')
                                    ->label('Über mich / Person')
                                    ->icon('heroicon-o-user-circle')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Name')
                                            ->required(),
                                        Forms\Components\TextInput::make('role')
                                            ->label('Rolle / Titel'),
                                        Forms\Components\RichEditor::make('bio')
                                            ->label('Biografie')
                                            ->columnSpanFull(),
                                        Forms\Components\FileUpload::make('photo')
                                            ->label('Foto')
                                            ->image()
                                            ->disk('public_media')
                                            ->directory('media/portraits'),
                                        Forms\Components\Actions::make([
                                            MediaPicker::action('photo'),
                                        ]),
                                        Forms\Components\Repeater::make('focusTags')
                                            ->label('Schwerpunkte / Tags')
                                            ->simple(
                                                Forms\Components\TextInput::make('tag')
                                                    ->label('Schwerpunkt')
                                                    ->required()
                                            )
                                            ->defaultItems(0),
                                    ]),

                                // ===== APPROACH BLOCK =====
                                Forms\Components\Builder\Block::make('approach')
                                    ->label('Ansatz / Methoden')
                                    ->icon('heroicon-o-light-bulb')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Beschreibung')
                                            ->rows(3),
                                        Forms\Components\Repeater::make('categories')
                                            ->label('Kategorien')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Kategorie-Titel')
                                                    ->required(),
                                                Forms\Components\Repeater::make('points')
                                                    ->label('Punkte')
                                                    ->simple(
                                                        Forms\Components\TextInput::make('text')
                                                            ->label('Punkt')
                                                            ->required()
                                                    )
                                                    ->defaultItems(0),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== DOWNLOADS BLOCK =====
                                Forms\Components\Builder\Block::make('downloads')
                                    ->label('Downloads')
                                    ->icon('heroicon-o-arrow-down-tray')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Dateien')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('type')
                                                    ->label('Typ (z.B. PDF, Checkliste)'),
                                                Forms\Components\FileUpload::make('file')
                                                    ->label('Datei')
                                                    ->disk('public_media')
                                                    ->directory('media/downloads')
                                                    ->acceptedFileTypes(['application/pdf', 'application/zip']),
                                                Forms\Components\Actions::make([
                                                    MediaPicker::action('file', 'all'),
                                                ]),
                                                Forms\Components\TextInput::make('downloadUrl')
                                                    ->label('Download-URL (alternativ)')
                                                    ->helperText('Wenn keine Datei hochgeladen wird'),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== PODCAST BLOCK =====
                                Forms\Components\Builder\Block::make('podcast')
                                    ->label('Podcast')
                                    ->icon('heroicon-o-microphone')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Beschreibung')
                                            ->rows(2),
                                        Forms\Components\Textarea::make('embedCode')
                                            ->label('Embed-Code / Script-URL')
                                            ->rows(3)
                                            ->helperText('z.B. letscast.fm Player-Script URL'),
                                    ]),

                                // ===== BOOKS BLOCK =====
                                Forms\Components\Builder\Block::make('books')
                                    ->label('Buchempfehlungen')
                                    ->icon('heroicon-o-book-open')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Bücher')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Buchtitel')
                                                    ->required(),
                                                Forms\Components\TextInput::make('author')
                                                    ->label('Autor'),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('Beschreibung')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('isbn')
                                                    ->label('ISBN'),
                                                Forms\Components\TextInput::make('link')
                                                    ->label('Link (Amazon, etc.)'),
                                                Forms\Components\FileUpload::make('cover')
                                                    ->label('Cover-Bild')
                                                    ->image()
                                                    ->disk('public_media')
                                                    ->directory('media/books'),
                                                Forms\Components\Actions::make([
                                                    MediaPicker::action('cover'),
                                                ]),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== NEWSLETTER BLOCK =====
                                Forms\Components\Builder\Block::make('newsletter')
                                    ->label('Newsletter')
                                    ->icon('heroicon-o-envelope')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Beschreibung')
                                            ->rows(2),
                                        Forms\Components\Textarea::make('embedCode')
                                            ->label('Embed-URL / Code')
                                            ->rows(3)
                                            ->helperText('z.B. KlickTipp iframe URL'),
                                    ]),

                                // ===== CONTACT FORM BLOCK =====
                                Forms\Components\Builder\Block::make('contact_form')
                                    ->label('Kontaktformular')
                                    ->icon('heroicon-o-chat-bubble-left-right')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Titel-Hervorhebung'),
                                        Forms\Components\Textarea::make('subtitle')
                                            ->label('Untertitel')
                                            ->rows(2),
                                        Forms\Components\TextInput::make('recipientEmail')
                                            ->label('Empfänger-E-Mail')
                                            ->email()
                                            ->helperText('An diese E-Mail wird das Formular gesendet'),
                                        Forms\Components\Repeater::make('serviceOptions')
                                            ->label('Leistungen-Dropdown')
                                            ->simple(
                                                Forms\Components\TextInput::make('option')
                                                    ->label('Option')
                                                    ->required()
                                            )
                                            ->defaultItems(0),
                                    ]),

                                // ===== CALENDAR EMBED BLOCK =====
                                Forms\Components\Builder\Block::make('calendar_embed')
                                    ->label('Terminbuchung / Kalender')
                                    ->icon('heroicon-o-calendar')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('calendarEmbedUrl')
                                            ->label('Google Calendar Embed-URL')
                                            ->url(),
                                        Forms\Components\TextInput::make('fallbackText')
                                            ->label('Fallback-Text'),
                                        Forms\Components\TextInput::make('fallbackButtonText')
                                            ->label('Fallback Button-Text'),
                                        Forms\Components\TextInput::make('fallbackUrl')
                                            ->label('Fallback / Direkt-Link URL')
                                            ->url(),
                                    ]),

                                // ===== BLOG LISTING BLOCK =====
                                Forms\Components\Builder\Block::make('blog_listing')
                                    ->label('Blog-Übersicht')
                                    ->icon('heroicon-o-newspaper')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\TextInput::make('limit')
                                            ->label('Anzahl Posts')
                                            ->numeric()
                                            ->default(3),
                                    ]),

                                // ===== THEMEN LISTING BLOCK =====
                                Forms\Components\Builder\Block::make('themen_listing')
                                    ->label('Themen aus DB (automatisch)')
                                    ->icon('heroicon-o-tag')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift')
                                            ->default('Aktuelle Themen'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->label('Untertitel'),
                                        Forms\Components\TextInput::make('limit')
                                            ->label('Anzahl Themen')
                                            ->numeric()
                                            ->default(6),
                                        Forms\Components\TextInput::make('ctaText')
                                            ->label('CTA-Button Text')
                                            ->default('Alle Themen entdecken'),
                                        Forms\Components\TextInput::make('ctaUrl')
                                            ->label('CTA-Button Link')
                                            ->default('/themen'),
                                    ]),

                                // ===== FAQ LISTING BLOCK =====
                                Forms\Components\Builder\Block::make('faq_listing')
                                    ->label('FAQs aus DB (automatisch)')
                                    ->icon('heroicon-o-question-mark-circle')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift')
                                            ->default('Häufige Fragen'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\TextInput::make('limit')
                                            ->label('Anzahl FAQs')
                                            ->numeric()
                                            ->default(5),
                                        Forms\Components\Select::make('zielgruppe')
                                            ->label('Zielgruppe')
                                            ->options([
                                                'alle' => 'Alle',
                                                'eltern' => 'Eltern',
                                                'fachpersonen' => 'Fachpersonen',
                                                'institutionen' => 'Institutionen',
                                            ])
                                            ->default('alle'),
                                    ]),

                                // ===== WIDGET EMBED BLOCK =====
                                Forms\Components\Builder\Block::make('widget_embed')
                                    ->label('Widget / Embed')
                                    ->icon('heroicon-o-code-bracket')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\Select::make('widgetType')
                                            ->label('Widget-Typ')
                                            ->options([
                                                'privacybee' => 'PrivacyBee (Datenschutz)',
                                                'privacybee-imprint' => 'PrivacyBee (Impressum)',
                                                'custom' => 'Benutzerdefiniert',
                                            ]),
                                        Forms\Components\TextInput::make('widgetId')
                                            ->label('Widget-ID'),
                                        Forms\Components\Textarea::make('scriptUrl')
                                            ->label('Script-URL oder Embed-Code')
                                            ->rows(3),
                                    ]),

                                // ===== IMPRESSUM BLOCK =====
                                Forms\Components\Builder\Block::make('impressum')
                                    ->label('Impressum')
                                    ->icon('heroicon-o-identification')
                                    ->schema([
                                        Forms\Components\TextInput::make('companyName')
                                            ->label('Firmenname')
                                            ->required(),
                                        Forms\Components\Textarea::make('address')
                                            ->label('Adresse')
                                            ->rows(3),
                                        Forms\Components\TextInput::make('email')
                                            ->label('E-Mail')
                                            ->email(),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Telefon'),
                                        Forms\Components\TextInput::make('representative')
                                            ->label('Vertretungsberechtigte Person'),
                                        Forms\Components\RichEditor::make('additionalInfo')
                                            ->label('Zusätzliche Informationen')
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                // ===== MISSION BLOCK =====
                                Forms\Components\Builder\Block::make('mission')
                                    ->label('Mission / Leitbild')
                                    ->icon('heroicon-o-flag')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Inhalt')
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('quote')
                                            ->label('Zitat')
                                            ->columnSpanFull(),
                                    ]),

                                // ===== CONTACT INFO BLOCK =====
                                Forms\Components\Builder\Block::make('contact_info')
                                    ->label('Kontaktinformationen')
                                    ->icon('heroicon-o-information-circle')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Beschreibung')
                                            ->rows(2),
                                        Forms\Components\Repeater::make('items')
                                            ->label('Info-Einträge')
                                            ->schema([
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name'),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\Textarea::make('content')
                                                    ->label('Inhalt')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('action')
                                                    ->label('Link / Aktion'),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),

                                // ===== LOCATION INFO BLOCK =====
                                Forms\Components\Builder\Block::make('location_info')
                                    ->label('Standort / Online-Info')
                                    ->icon('heroicon-o-map-pin')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Überschrift'),
                                        Forms\Components\TextInput::make('titleHighlight')
                                            ->label('Überschrift-Hervorhebung'),
                                        Forms\Components\Textarea::make('subtitle')
                                            ->label('Untertitel')
                                            ->rows(2),
                                        Forms\Components\Repeater::make('cards')
                                            ->label('Info-Karten')
                                            ->schema([
                                                Forms\Components\TextInput::make('icon')
                                                    ->label('Icon-Name'),
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Titel')
                                                    ->required(),
                                                Forms\Components\RichEditor::make('content')
                                                    ->label('Inhalt'),
                                            ])
                                            ->collapsible()
                                            ->defaultItems(0),
                                    ]),
                            ])
                            ->collapsible()
                            ->blockNumbers(true)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Seitentitel')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('URL-Slug')
                    ->searchable()
                    ->badge()
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Veröffentlicht')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Zuletzt bearbeitet')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Veröffentlicht'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Bearbeiten'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
