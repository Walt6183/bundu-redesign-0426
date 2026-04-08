<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Filament\Forms\Components\MediaPicker;
use Filament\Tables;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Kurse';
    protected static ?string $modelLabel = 'Kurs';
    protected static ?string $pluralModelLabel = 'Kurse';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kurs-Informationen')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titel')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) =>
                                $set('slug', \Illuminate\Support\Str::slug($state))
                            ),
                        Forms\Components\TextInput::make('slug')
                            ->label('URL-Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Untertitel')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Beschreibung')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('media/courses')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Kurs-Details')
                    ->schema([
                        Forms\Components\TextInput::make('duration')
                            ->label('Dauer')
                            ->placeholder('z.B. 8 Wochen')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('sessions')
                            ->label('Anzahl Sessions')
                            ->placeholder('z.B. 16 Sessions')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('max_participants')
                            ->label('Max. Teilnehmer')
                            ->numeric()
                            ->minValue(1),
                        Forms\Components\TextInput::make('price')
                            ->label('Preis (CHF)')
                            ->numeric()
                            ->prefix('CHF')
                            ->step(0.01),
                        Forms\Components\TextInput::make('next_date')
                            ->label('Nächster Starttermin')
                            ->placeholder('z.B. 01.03.2026 oder laufend')
                            ->maxLength(100)
                            ->helperText('Datum (z.B. 15.04.2026) oder "laufend" für fortlaufende Kurse'),
                        Forms\Components\TextInput::make('booking_url')
                            ->label('Buchungs-URL')
                            ->url()
                            ->placeholder('https://...')
                            ->helperText('Link zur Anmeldung / Checkout-Seite'),
                    ])->columns(3),

                Forms\Components\Section::make('Kursinhalte')
                    ->schema([
                        Forms\Components\Repeater::make('highlights')
                            ->label('Kursinhalte / Highlights')
                            ->simple(
                                Forms\Components\TextInput::make('highlight')
                                    ->label('Inhaltspunkt')
                                    ->required()
                            )
                            ->addActionLabel('Inhaltspunkt hinzufügen')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('target_audience')
                            ->label('Zielgruppe')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('An wen richtet sich dieser Kurs?'),
                    ]),

                Forms\Components\Section::make('Status & Medien')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Entwurf',
                                'active' => 'Aktiv',
                                'fully_booked' => 'Ausgebucht',
                                'archived' => 'Archiviert',
                            ])
                            ->default('draft')
                            ->required()
                            ->native(false),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sortierung')
                            ->numeric()
                            ->default(0)
                            ->helperText('Kleinere Zahl = weiter oben'),
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Cover-Bild')
                            ->image()
                            ->disk('public')
                            ->directory('media/courses')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('675')
                            ->helperText('Empfohlene Grösse: 1200x675px (16:9)')
                            ->columnSpanFull(),
                        Forms\Components\Actions::make([
                            MediaPicker::action('cover_image'),
                        ])->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('seo_title')
                            ->label('SEO Titel')
                            ->maxLength(70)
                            ->helperText('Max. 70 Zeichen'),
                        Forms\Components\Textarea::make('seo_description')
                            ->label('SEO Beschreibung')
                            ->maxLength(160)
                            ->rows(2)
                            ->helperText('Max. 160 Zeichen'),
                    ])->columns(2)->collapsible()->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Bild')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titel')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'fully_booked' => 'danger',
                        'draft' => 'warning',
                        'archived' => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Aktiv',
                        'fully_booked' => 'Ausgebucht',
                        'draft' => 'Entwurf',
                        'archived' => 'Archiviert',
                    }),
                Tables\Columns\TextColumn::make('price')
                    ->label('Preis')
                    ->money('CHF')
                    ->sortable(),
                Tables\Columns\TextColumn::make('next_date')
                    ->label('Nächster Termin')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Sortierung')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Bearbeitet')
                    ->dateTime('d.m.Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Entwurf',
                        'active' => 'Aktiv',
                        'fully_booked' => 'Ausgebucht',
                        'archived' => 'Archiviert',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('toggle_booked')
                    ->label(fn (Course $record) => $record->status === 'fully_booked' ? 'Freigeben' : 'Ausgebucht')
                    ->icon(fn (Course $record) => $record->status === 'fully_booked' ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->color(fn (Course $record) => $record->status === 'fully_booked' ? 'success' : 'danger')
                    ->requiresConfirmation()
                    ->action(function (Course $record) {
                        $record->update([
                            'status' => $record->status === 'fully_booked' ? 'active' : 'fully_booked',
                        ]);
                    })
                    ->visible(fn (Course $record) => in_array($record->status, ['active', 'fully_booked'])),
                Tables\Actions\EditAction::make()
                    ->label('Bearbeiten'),
                Tables\Actions\DeleteAction::make()
                    ->label('Löschen'),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
