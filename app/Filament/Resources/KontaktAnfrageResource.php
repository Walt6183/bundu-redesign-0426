<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontaktAnfrageResource\Pages;
use App\Models\KontaktAnfrage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KontaktAnfrageResource extends Resource
{
    protected static ?string $model = KontaktAnfrage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Anfragen';

    protected static ?string $navigationLabel = 'Kontaktanfragen';

    protected static ?string $modelLabel = 'Kontaktanfrage';

    protected static ?string $pluralModelLabel = 'Kontaktanfragen';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->disabled(),

                Forms\Components\TextInput::make('email')
                    ->disabled(),

                Forms\Components\TextInput::make('ich_bin')
                    ->label('Ich bin')
                    ->disabled(),

                Forms\Components\TextInput::make('institution')
                    ->disabled(),

                Forms\Components\TextInput::make('betreff')
                    ->disabled(),

                Forms\Components\Textarea::make('nachricht')
                    ->disabled()
                    ->rows(6),

                Forms\Components\Select::make('status')
                    ->options([
                        'neu' => 'Neu',
                        'gelesen' => 'Gelesen',
                        'beantwortet' => 'Beantwortet',
                        'archiviert' => 'Archiviert',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('ich_bin')
                    ->label('Typ')
                    ->badge(),

                Tables\Columns\TextColumn::make('betreff')
                    ->limit(40),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'neu' => 'danger',
                        'gelesen' => 'warning',
                        'beantwortet' => 'success',
                        'archiviert' => 'gray',
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
                        'neu' => 'Neu',
                        'gelesen' => 'Gelesen',
                        'beantwortet' => 'Beantwortet',
                        'archiviert' => 'Archiviert',
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
            'index' => Pages\ListKontaktAnfragen::route('/'),
            'edit' => Pages\EditKontaktAnfrage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'neu')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
