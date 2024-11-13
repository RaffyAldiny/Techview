<?php

namespace App\Filament\Resources\MobileComparisonResource\Pages;

use App\Filament\Resources\MobileComparisonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMobileComparison extends EditRecord
{
    protected static string $resource = MobileComparisonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
