<?php

namespace App\Filament\Resources\Dues\Pages;

use App\Filament\Resources\Dues\DueResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDue extends CreateRecord
{
    protected static string $resource = DueResource::class;
}
