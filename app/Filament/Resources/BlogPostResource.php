<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Filament\Forms\Components\MediaPicker;
use Filament\Tables;
use Filament\Tables\Table;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Blog';
    protected static ?string $modelLabel = 'Blog-Beitrag';
    protected static ?string $pluralModelLabel = 'Blog-Beiträge';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Inhalt')
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
                        Forms\Components\Textarea::make('excerpt')
                            ->label('Kurzfassung / Teaser')
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText('Wird in der Blog-Übersicht angezeigt'),
                        Forms\Components\RichEditor::make('content')
                            ->label('Inhalt')
                            ->required()
                            ->fileAttachmentsDisk('public_media')
                            ->fileAttachmentsDirectory('media/blog')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Medien & Kategorie')
                    ->schema([
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Cover-Bild')
                            ->image()
                            ->disk('public_media')
                            ->directory('media/blog-covers')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('675')
                            ->helperText('Empfohlene Grösse: 1200x675px (16:9)'),
                        Forms\Components\Actions::make([
                            MediaPicker::action('cover_image'),
                        ]),
                        Forms\Components\Select::make('category_id')
                            ->label('Kategorie')
                            ->relationship('blogCategory', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Neue Kategorie')
                                    ->required()
                                    ->unique('blog_categories', 'name'),
                            ]),
                        Forms\Components\TextInput::make('author')
                            ->label('Autor')
                            ->default('B&U BundU - Walter Uehli'),
                    ])->columns(3),

                Forms\Components\Section::make('Veröffentlichung')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Entwurf',
                                'published' => 'Veröffentlicht',
                            ])
                            ->default('draft')
                            ->required(),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Veröffentlichungsdatum')
                            ->default(now()),
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
                    ->disk('public_media')
                    ->circular()
                    ->defaultImageUrl('/blog-placeholder.png'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titel')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('blogCategory.name')
                    ->label('Kategorie')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'published' => 'Veröffentlicht',
                        'draft' => 'Entwurf',
                    }),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Veröffentlicht am')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Bearbeitet')
                    ->dateTime('d.m.Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Entwurf',
                        'published' => 'Veröffentlicht',
                    ]),
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategorie')
                    ->relationship('blogCategory', 'name'),
            ])
            ->actions([
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
