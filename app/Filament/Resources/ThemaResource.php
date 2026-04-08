<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThemaResource\Pages;
use App\Models\Thema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ThemaResource extends Resource
{
    protected static ?string $model = Thema::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationGroup = 'Inhalte';

    protected static ?string $navigationLabel = 'Themen';

    protected static ?string $modelLabel = 'Thema';

    protected static ?string $pluralModelLabel = 'Themen';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'titel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Grunddaten')
                    ->schema([
                        Forms\Components\TextInput::make('titel')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\CheckboxList::make('zielgruppen')
                            ->options([
                                'eltern' => 'Eltern',
                                'fachpersonen' => 'Fachpersonen',
                                'institutionen' => 'Institutionen',
                            ])
                            ->columns(3),

                        Forms\Components\Toggle::make('aktiv')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Inhalt')
                    ->schema([
                        Forms\Components\Textarea::make('einleitung')
                            ->rows(3),

                        Forms\Components\RichEditor::make('problem')
                            ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3']),

                        Forms\Components\RichEditor::make('loesungsansatz')
                            ->label('Lösungsansatz')
                            ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3']),
                    ]),

                Forms\Components\Section::make('Bild & SEO')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                            ->label('Bild')
                            ->image()
                            ->directory('themen')
                            ->maxSize(5120),

                        Forms\Components\TextInput::make('meta_titel')
                            ->label('Meta-Titel'),

                        Forms\Components\Textarea::make('meta_beschreibung')
                            ->label('Meta-Beschreibung')
                            ->maxLength(160)
                            ->rows(2),
                    ]),

                Forms\Components\Section::make('Verknüpfungen')
                    ->schema([
                        Forms\Components\Select::make('angebote')
                            ->label('Passende Angebote')
                            ->relationship('angebote', 'titel')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titel')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('aktiv')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Geändert')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('aktiv')
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListThemen::route('/'),
            'create' => Pages\CreateThema::route('/create'),
            'edit' => Pages\EditThema::route('/{record}/edit'),
        ];
    }
}
