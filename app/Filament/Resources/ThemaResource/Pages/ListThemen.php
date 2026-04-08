<?php

namespace App\Filament\Resources\ThemaResource\Pages;

use App\Filament\Resources\ThemaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThemen extends ListRecords
{
    protected static string $resource = ThemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
