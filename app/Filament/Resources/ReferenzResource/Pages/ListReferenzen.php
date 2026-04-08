<?php
namespace App\Filament\Resources\ReferenzResource\Pages;
use App\Filament\Resources\ReferenzResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListReferenzen extends ListRecords
{
    protected static string $resource = ReferenzResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
