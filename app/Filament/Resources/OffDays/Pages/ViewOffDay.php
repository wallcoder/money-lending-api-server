<?php

namespace App\Filament\Resources\OffDays\Pages;

use App\Filament\Resources\OffDays\OffDayResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOffDay extends ViewRecord
{
    protected static string $resource = OffDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
