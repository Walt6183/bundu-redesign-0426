<?php
namespace App\Filament\Resources\ImpulsResource\Pages;
use App\Filament\Resources\ImpulsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImpuls extends EditRecord
{
    protected static string $resource = ImpulsResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
