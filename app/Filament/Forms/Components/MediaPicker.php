<?php

namespace App\Filament\Forms\Components;

use App\Models\Media;
use Filament\Forms;

class MediaPicker
{
    /**
     * Creates an action button to pick a file from the existing media library.
     *
     * @param string $fieldName  Target form field to fill (e.g. 'cover_image', 'photo')
     * @param string $type       Filter: 'image', 'document', 'video', 'audio', or 'all'
     */
    public static function action(string $fieldName, string $type = 'image'): Forms\Components\Actions\Action
    {
        return Forms\Components\Actions\Action::make('pick_' . str_replace('.', '_', $fieldName) . '_from_media')
            ->label('Aus Medien wählen')
            ->icon('heroicon-o-photo')
            ->color('gray')
            ->size('sm')
            ->modalHeading('Medium aus Bibliothek wählen')
            ->modalSubmitActionLabel('Auswählen')
            ->modalWidth('md')
            ->form([
                Forms\Components\Select::make('media_path')
                    ->label('Medium')
                    ->options(function () use ($type) {
                        $query = Media::query();
                        if ($type !== 'all') {
                            $query->where('file_type', $type);
                        }
                        return $query->orderBy('created_at', 'desc')
                            ->get()
                            ->mapWithKeys(fn ($media) => [
                                $media->file_path => $media->name . ' (' . $media->readable_size . ')',
                            ])
                            ->toArray();
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
            ])
            ->action(function (array $data, Forms\Set $set) use ($fieldName) {
                // FileUpload expects array state (afterStateHydrated wraps via Arr::wrap)
                $set($fieldName, [$data['media_path']]);
            });
    }
}
