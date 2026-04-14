<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use App\Models\Media;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Resolve file metadata from the uploaded file
        if (!empty($data['file_path'])) {
            $path = $data['file_path'];
            $disk = $data['disk'] ?? 'public_media';

            if (Storage::disk($disk)->exists($path)) {
                $data['file_name'] = $data['file_name'] ?: basename($path);
                $data['mime_type'] = Storage::disk($disk)->mimeType($path);
                $data['file_size'] = Storage::disk($disk)->size($path);
                $data['file_type'] = Media::typeFromMime($data['mime_type']);
            }

            // Default name from file_name if not set
            if (empty($data['name'])) {
                $data['name'] = pathinfo($data['file_name'] ?: basename($path), PATHINFO_FILENAME);
            }
        }

        return $data;
    }
}
