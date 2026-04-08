<?php

namespace App\Filament\Resources\AngebotResource\Pages;

use App\Filament\Resources\AngebotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAngebote extends ListRecords
{
    protected static string $resource = AngebotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
