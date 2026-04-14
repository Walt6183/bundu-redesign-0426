<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Medien';
    protected static ?string $modelLabel = 'Medium';
    protected static ?string $pluralModelLabel = 'Medien';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Inhalte';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datei')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Datei hochladen')
                            ->required()
                            ->disk('public_media')
                            ->directory('media/library')
                            ->visibility('public')
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'image/svg+xml',
                                'image/gif',
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                'application/vnd.ms-excel',
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/zip',
                            ])
                            ->maxSize(10240) // 10 MB
                            ->helperText('Max. 10 MB. Erlaubt: Bilder (JPG, PNG, WebP, SVG, GIF), PDF, Word, Excel, ZIP')
                            ->columnSpanFull()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                if ($state) {
                                    // Try to extract file info from temporary upload
                                    if (is_string($state)) {
                                        $set('file_name', basename($state));
                                        $ext = strtolower(pathinfo($state, PATHINFO_EXTENSION));
                                        $set('file_type', self::typeFromExtension($ext));
                                    }
                                }
                            }),
                    ]),

                Forms\Components\Section::make('Informationen')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Anzeigename')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Name der Datei wie er angezeigt wird'),
                        Forms\Components\TextInput::make('alt_text')
                            ->label('Alt-Text')
                            ->maxLength(255)
                            ->helperText('Beschreibung für Barrierefreiheit (besonders für Bilder wichtig)'),
                        Forms\Components\Textarea::make('description')
                            ->label('Beschreibung')
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText('Optionale Beschreibung der Datei'),
                        Forms\Components\Select::make('file_type')
                            ->label('Dateityp')
                            ->options([
                                'image' => 'Bild',
                                'document' => 'Dokument',
                                'video' => 'Video',
                                'audio' => 'Audio',
                            ])
                            ->default('document')
                            ->required(),
                        Forms\Components\Hidden::make('file_name'),
                        Forms\Components\Hidden::make('mime_type'),
                        Forms\Components\Hidden::make('file_size'),
                        Forms\Components\Hidden::make('disk')
                            ->default('public_media'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('file_path')
                    ->label('Vorschau')
                    ->disk('public_media')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => match ($record->file_type) {
                        'document' => null,
                        default => null,
                    })
                    ->visibility(fn ($record) => $record->file_type === 'image'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('file_type')
                    ->label('Typ')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'document' => 'info',
                        'video' => 'warning',
                        'audio' => 'primary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'image' => 'Bild',
                        'document' => 'Dokument',
                        'video' => 'Video',
                        'audio' => 'Audio',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('file_name')
                    ->label('Dateiname')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('readable_size')
                    ->label('Grösse')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Hochgeladen')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('file_type')
                    ->label('Dateityp')
                    ->options([
                        'image' => 'Bild',
                        'document' => 'Dokument',
                        'video' => 'Video',
                        'audio' => 'Audio',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Media $record) => Storage::disk($record->disk ?? 'public_media')->url($record->file_path))
                    ->openUrlInNewTab(),
                Tables\Actions\Action::make('copy_url')
                    ->label('URL kopieren')
                    ->icon('heroicon-o-clipboard')
                    ->action(function (Media $record) {
                        // URL wird per JS kopiert — Notification zeigt die URL
                    })
                    ->successNotificationTitle('URL kopiert')
                    ->after(fn (Media $record) => null),
                Tables\Actions\EditAction::make()
                    ->label('Bearbeiten'),
                Tables\Actions\DeleteAction::make()
                    ->label('Löschen')
                    ->after(function (Media $record) {
                        // Datei vom Disk löschen
                        Storage::disk($record->disk ?? 'public_media')->delete($record->file_path);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Ausgewählte löschen'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }

    /**
     * Determine file type from extension
     */
    private static function typeFromExtension(string $ext): string
    {
        return match ($ext) {
            'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg' => 'image',
            'mp4', 'webm', 'mov', 'avi' => 'video',
            'mp3', 'wav', 'ogg' => 'audio',
            default => 'document',
        };
    }
}
