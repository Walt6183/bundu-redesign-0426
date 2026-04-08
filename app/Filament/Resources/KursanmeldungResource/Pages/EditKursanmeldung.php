<?php
namespace App\Filament\Resources\KursanmeldungResource\Pages;
use App\Filament\Resources\KursanmeldungResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditKursanmeldung extends EditRecord
{
    protected static string $resource = KursanmeldungResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
