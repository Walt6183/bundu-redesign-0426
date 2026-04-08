<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KursanmeldungResource\Pages;
use App\Models\Kursanmeldung;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KursanmeldungResource extends Resource
{
    protected static ?string $model = Kursanmeldung::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Anfragen';

    protected static ?string $navigationLabel = 'Kursanmeldungen';

    protected static ?string $modelLabel = 'Kursanmeldung';

    protected static ?string $pluralModelLabel = 'Kursanmeldungen';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('angebot_id')
                    ->label('Angebot')
                    ->relationship('angebot', 'titel')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                Forms\Components\TextInput::make('kurstermin')
                    ->disabled(),

                Forms\Components\TextInput::make('teilnehmer_anzahl')
                    ->label('Teilnehmerzahl')
                    ->disabled(),

                Forms\Components\TextInput::make('institution')
                    ->disabled(),

                Forms\Components\TextInput::make('kontaktperson')
                    ->disabled(),

                Forms\Components\TextInput::make('kontakt_email')
                    ->label('E-Mail')
                    ->disabled(),

                Forms\Components\Textarea::make('bemerkungen')
                    ->disabled()
                    ->rows(4),

                Forms\Components\Select::make('status')
                    ->options([
                        'ausstehend' => 'Ausstehend',
                        'bestaetigt' => 'Bestätigt',
                        'storniert' => 'Storniert',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('angebot.titel')
                    ->label('Angebot')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kurstermin'),

                Tables\Columns\TextColumn::make('institution')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kontaktperson')
                    ->searchable(),

                Tables\Columns\TextColumn::make('teilnehmer_anzahl')
                    ->label('TN'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ausstehend' => 'warning',
                        'bestaetigt' => 'success',
                        'storniert' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Eingegangen')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'ausstehend' => 'Ausstehend',
                        'bestaetigt' => 'Bestätigt',
                        'storniert' => 'Storniert',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKursanmeldungen::route('/'),
            'edit' => Pages\EditKursanmeldung::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'ausstehend')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
