<?php

namespace App\Filament\Resources\MobileSocResource\Pages;

use App\Filament\Resources\MobileSocResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMobileSoc extends EditRecord
{
    protected static string $resource = MobileSocResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
