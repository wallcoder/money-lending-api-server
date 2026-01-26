<?php

namespace App\Filament\Resources\OffDays\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OffDayInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('from')
                    ->date(),
                TextEntry::make('to')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
