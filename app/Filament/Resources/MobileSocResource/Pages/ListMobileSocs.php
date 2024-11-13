<?php

namespace App\Filament\Resources\MobileSocResource\Pages;

use App\Filament\Resources\MobileSocResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMobileSocs extends ListRecords
{
    protected static string $resource = MobileSocResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
