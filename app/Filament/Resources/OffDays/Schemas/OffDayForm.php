<?php

namespace App\Filament\Resources\OffDays\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OffDayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                DatePicker::make('from')
                    ->required(),
                DatePicker::make('to')
                    ->required(),
            ]);
    }
}
