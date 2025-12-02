<?php

namespace App\Filament\Resources\Loans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'full_name')
                    ->required(),
                TextInput::make('principal')
                    ->required()
                    ->numeric(),
                TextInput::make('total_interest')
                    ->required()
                    ->numeric(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('frequency')
                    ->required(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
