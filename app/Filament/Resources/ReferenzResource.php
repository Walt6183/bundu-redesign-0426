<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferenzResource\Pages;
use App\Models\Referenz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Media;

class ReferenzResource extends Resource
{
    protected static ?string $model = Referenz::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Inhalte';

    protected static ?string $navigationLabel = 'Referenzen';

    protected static ?string $modelLabel = 'Referenz';

    protected static ?string $pluralModelLabel = 'Referenzen';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('organisation'),

                Forms\Components\Textarea::make('zitat')
                    ->rows(4),

                Forms\Components\Select::make('zielgruppe')
                    ->options([
                        'eltern' => 'Eltern',
                        'fachpersonen' => 'Fachpersonen',
                        'institutionen' => 'Institutionen',
                    ]),

                Forms\Components\Select::make('media_auswahl')
                    ->label('Aus Mediathek wählen')
                    ->options(fn () => Media::where('file_type', 'image')->orderBy('name')->pluck('name', 'file_path'))
                    ->searchable()
                    ->placeholder('Bild aus Mediathek wählen...')
                    ->dehydrated(false)
                    ->live()
                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $state ? $set('bild', $state) : null),

                Forms\Components\FileUpload::make('bild')
                    ->label('Oder neues Bild hochladen')
                    ->image()
                    ->disk('public_media')
                    ->directory('media/referenzen')
                    ->maxSize(2048),

                Forms\Components\Toggle::make('aktiv')
                    ->default(true),

                Forms\Components\TextInput::make('sortierung')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('organisation')
                    ->searchable(),

                Tables\Columns\TextColumn::make('zielgruppe')
                    ->badge(),

                Tables\Columns\IconColumn::make('aktiv')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sortierung')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('zielgruppe')
                    ->options([
                        'eltern' => 'Eltern',
                        'fachpersonen' => 'Fachpersonen',
                        'institutionen' => 'Institutionen',
                    ]),
                Tables\Filters\TernaryFilter::make('aktiv'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sortierung');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReferenzen::route('/'),
            'create' => Pages\CreateReferenz::route('/create'),
            'edit' => Pages\EditReferenz::route('/{record}/edit'),
        ];
    }
}
