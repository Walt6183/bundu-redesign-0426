<?php
namespace App\Filament\Resources\ImpulsResource\Pages;
use App\Filament\Resources\ImpulsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImpulse extends ListRecords
{
    protected static string $resource = ImpulsResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
