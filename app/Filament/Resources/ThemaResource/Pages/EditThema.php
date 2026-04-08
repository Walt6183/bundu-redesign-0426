<?php

namespace App\Filament\Resources\ThemaResource\Pages;

use App\Filament\Resources\ThemaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThema extends EditRecord
{
    protected static string $resource = ThemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
