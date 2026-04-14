<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImpulsResource\Pages;
use App\Models\Impuls;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Filament\Forms\Components\MediaPicker;

class ImpulsResource extends Resource
{
    protected static ?string $model = Impuls::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Inhalte';

    protected static ?string $navigationLabel = 'Impulse';

    protected static ?string $modelLabel = 'Impuls';

    protected static ?string $pluralModelLabel = 'Impulse';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'titel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Impuls')
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

                                Forms\Components\Select::make('kategorie')
                                    ->options([
                                        'eltern' => 'Eltern',
                                        'fachpersonen' => 'Fachpersonen',
                                        'institutionen' => 'Institutionen',
                                        'neue-autoritaet' => 'Neue Autorität',
                                        'konflikt' => 'Konflikt',
                                        'gewaltpraevention' => 'Gewaltprävention',
                                        'allgemein' => 'Allgemein',
                                    ]),

                                Forms\Components\TextInput::make('autor')
                                    ->default('Walter Uehli'),

                                Forms\Components\DatePicker::make('datum')
                                    ->default(now()),

                                Forms\Components\Toggle::make('aktiv')
                                    ->default(true),

                                Forms\Components\Toggle::make('featured')
                                    ->label('Hervorgehoben'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Inhalt')
                            ->schema([
                                Forms\Components\Textarea::make('intro')
                                    ->rows(3),

                                Forms\Components\RichEditor::make('inhalt')
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3', 'blockquote']),

                                Forms\Components\Repeater::make('key_takeaways')
                                    ->label('Key Takeaways')
                                    ->simple(
                                        Forms\Components\TextInput::make('takeaway')
                                            ->required(),
                                    )
                                    ->defaultItems(0),
                            ]),

                        Forms\Components\Tabs\Tab::make('Lead & Tags')
                            ->schema([
                                Forms\Components\Textarea::make('lead_box_text')
                                    ->label('Lead-Box Text')
                                    ->rows(3),

                                Forms\Components\TextInput::make('lead_box_cta')
                                    ->label('Lead-Box CTA'),

                                Forms\Components\TagsInput::make('tags'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Bild & SEO')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->label('Bild')
                                    ->image()
                                    ->disk('public_media')
                                    ->directory('media/impulse')
                                    ->maxSize(5120),
                                Forms\Components\Actions::make([
                                    MediaPicker::action('featured_image'),
                                ]),

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

                Tables\Columns\TextColumn::make('kategorie')
                    ->badge(),

                Tables\Columns\TextColumn::make('autor'),

                Tables\Columns\TextColumn::make('datum')
                    ->date('d.m.Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('featured')
                    ->boolean()
                    ->label('★'),

                Tables\Columns\IconColumn::make('aktiv')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategorie')
                    ->options([
                        'eltern' => 'Eltern',
                        'fachpersonen' => 'Fachpersonen',
                        'institutionen' => 'Institutionen',
                        'neue-autoritaet' => 'Neue Autorität',
                        'konflikt' => 'Konflikt',
                        'gewaltpraevention' => 'Gewaltprävention',
                        'allgemein' => 'Allgemein',
                    ]),
                Tables\Filters\TernaryFilter::make('aktiv'),
                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Hervorgehoben'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('datum', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImpulse::route('/'),
            'create' => Pages\CreateImpuls::route('/create'),
            'edit' => Pages\EditImpuls::route('/{record}/edit'),
        ];
    }
}
