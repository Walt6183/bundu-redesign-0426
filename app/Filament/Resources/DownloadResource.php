<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadResource\Pages;
use App\Models\Download;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DownloadResource extends Resource
{
    protected static ?string $model = Download::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';

    protected static ?string $navigationGroup = 'Inhalte';

    protected static ?string $navigationLabel = 'Downloads';

    protected static ?string $modelLabel = 'Download';

    protected static ?string $pluralModelLabel = 'Downloads';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titel')
                    ->required(),

                Forms\Components\Textarea::make('beschreibung')
                    ->rows(3),

                Forms\Components\FileUpload::make('datei')
                    ->directory('downloads')
                    ->maxSize(20480)
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

                Forms\Components\Select::make('zielgruppe')
                    ->options([
                        'eltern' => 'Eltern',
                        'fachpersonen' => 'Fachpersonen',
                        'institutionen' => 'Institutionen',
                    ]),

                Forms\Components\Select::make('kategorie')
                    ->options([
                        'checkliste' => 'Checkliste',
                        'leitfaden' => 'Leitfaden',
                        'arbeitsblatt' => 'Arbeitsblatt',
                        'ebook' => 'E-Book',
                    ]),

                Forms\Components\Toggle::make('aktiv')
                    ->default(true),
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

                Tables\Columns\TextColumn::make('zielgruppe')
                    ->badge(),

                Tables\Columns\IconColumn::make('aktiv')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategorie')
                    ->options([
                        'checkliste' => 'Checkliste',
                        'leitfaden' => 'Leitfaden',
                        'arbeitsblatt' => 'Arbeitsblatt',
                        'ebook' => 'E-Book',
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDownloads::route('/'),
            'create' => Pages\CreateDownload::route('/create'),
            'edit' => Pages\EditDownload::route('/{record}/edit'),
        ];
    }
}
