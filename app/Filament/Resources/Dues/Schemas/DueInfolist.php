<?php

namespace App\Filament\Resources\Dues\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DueInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('loan_id')
                    ->numeric(),
                TextEntry::make('due_date')
                    ->date(),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('penalty_amount')
                    ->numeric(),
                TextEntry::make('amount_paid')
                    ->numeric(),
                TextEntry::make('penalty_paid')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
