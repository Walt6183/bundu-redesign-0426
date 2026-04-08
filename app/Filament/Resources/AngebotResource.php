<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AngebotResource\Pages;
use App\Models\Angebot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AngebotResource extends Resource
{
    protected static ?string $model = Angebot::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'Inhalte';

    protected static ?string $navigationLabel = 'Angebote';

    protected static ?string $modelLabel = 'Angebot';

    protected static ?string $pluralModelLabel = 'Angebote';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'titel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Angebot')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Grunddaten')
                            ->schema([
                                Forms\Components\TextInput::make('titel')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                Forms\Components\CheckboxList::make('zielgruppe')
                                    ->options([
                                        'eltern' => 'Eltern',
                                        'fachpersonen' => 'Fachpersonen',
                                        'institutionen' => 'Institutionen',
                                    ])
                                    ->columns(3),

                                Forms\Components\Textarea::make('kurzbeschreibung')
                                    ->rows(3),

                                Forms\Components\TextInput::make('preis_info')
                                    ->label('Preis / Info'),

                                Forms\Components\Toggle::make('aktiv')
                                    ->default(true),

                                Forms\Components\TextInput::make('sortierung')
                                    ->numeric()
                                    ->default(0),
                            ]),

                        Forms\Components\Tabs\Tab::make('Inhalt')
                            ->schema([
                                Forms\Components\RichEditor::make('nutzen')
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3']),

                                Forms\Components\RichEditor::make('fuer_wen')
                                    ->label('Für wen')
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link']),

                                Forms\Components\RichEditor::make('inhalte')
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3']),

                                Forms\Components\RichEditor::make('ablauf')
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link']),
                            ]),

                        Forms\Components\Tabs\Tab::make('CTA & Bild')
                            ->schema([
                                Forms\Components\TextInput::make('cta_text')
                                    ->label('CTA Text'),

                                Forms\Components\TextInput::make('cta_url')
                                    ->label('CTA URL'),

                                Forms\Components\FileUpload::make('featured_image')
                                    ->label('Bild')
                                    ->image()
                                    ->directory('angebote')
                                    ->maxSize(5120),
                            ]),

                        Forms\Components\Tabs\Tab::make('FAQ')
                            ->schema([
                                Forms\Components\Repeater::make('faqs')
                                    ->label('Häufige Fragen')
                                    ->schema([
                                        Forms\Components\TextInput::make('frage')
                                            ->required(),
                                        Forms\Components\Textarea::make('antwort')
                                            ->required()
                                            ->rows(3),
                                    ])
                                    ->collapsible()
                                    ->defaultItems(0),
                            ]),

                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('meta_titel')
                                    ->label('Meta-Titel'),

                                Forms\Components\Textarea::make('meta_beschreibung')
                                    ->label('Meta-Beschreibung')
                                    ->maxLength(160)
                                    ->rows(2),
                            ]),
                    ])
                    ->columnSpanFull(),
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

                Tables\Columns\TextColumn::make('preis_info')
                    ->label('Preis'),

                Tables\Columns\IconColumn::make('aktiv')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sortierung')
                    ->sortable(),

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
            ])
            ->defaultSort('sortierung');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAngebote::route('/'),
            'create' => Pages\CreateAngebot::route('/create'),
            'edit' => Pages\EditAngebot::route('/{record}/edit'),
        ];
    }
}
