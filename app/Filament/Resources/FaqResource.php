<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Inhalte';

    protected static ?string $navigationLabel = 'FAQ';

    protected static ?string $modelLabel = 'FAQ';

    protected static ?string $pluralModelLabel = 'FAQs';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('frage')
                    ->required(),

                Forms\Components\RichEditor::make('antwort')
                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link']),

                Forms\Components\Select::make('zielgruppe')
                    ->options([
                        'alle' => 'Alle',
                        'eltern' => 'Eltern',
                        'fachpersonen' => 'Fachpersonen',
                        'institutionen' => 'Institutionen',
                    ])
                    ->default('alle'),

                Forms\Components\Select::make('thema_id')
                    ->label('Thema')
                    ->relationship('thema', 'titel')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                Forms\Components\TextInput::make('sortierung')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('aktiv')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('frage')
                    ->searchable()
                    ->sortable()
                    ->limit(60),

                Tables\Columns\TextColumn::make('zielgruppe')
                    ->badge(),

                Tables\Columns\TextColumn::make('thema.titel')
                    ->label('Thema')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('aktiv')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sortierung')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('zielgruppe')
                    ->options([
                        'alle' => 'Alle',
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
