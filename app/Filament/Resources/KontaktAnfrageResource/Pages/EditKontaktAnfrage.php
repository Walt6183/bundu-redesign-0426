<?php
namespace App\Filament\Resources\KontaktAnfrageResource\Pages;
use App\Filament\Resources\KontaktAnfrageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditKontaktAnfrage extends EditRecord
{
    protected static string $resource = KontaktAnfrageResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
