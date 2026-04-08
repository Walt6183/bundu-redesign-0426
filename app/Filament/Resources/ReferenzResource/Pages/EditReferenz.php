<?php
namespace App\Filament\Resources\ReferenzResource\Pages;
use App\Filament\Resources\ReferenzResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditReferenz extends EditRecord
{
    protected static string $resource = ReferenzResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
