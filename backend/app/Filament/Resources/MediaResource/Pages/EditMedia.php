<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use App\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditMedia extends EditRecord
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Löschen')
                ->after(function () {
                    $record = $this->record;
                    Storage::disk($record->disk ?? 'public')->delete($record->file_path);
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Update file metadata if file was changed
        if (!empty($data['file_path'])) {
            $path = $data['file_path'];
            $disk = $data['disk'] ?? 'public';

            if (Storage::disk($disk)->exists($path)) {
                $data['file_name'] = basename($path);
                $data['mime_type'] = Storage::disk($disk)->mimeType($path);
                $data['file_size'] = Storage::disk($disk)->size($path);
                $data['file_type'] = Media::typeFromMime($data['mime_type']);
            }
        }

        return $data;
    }
}
