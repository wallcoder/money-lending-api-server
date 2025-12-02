<?php

namespace App\Filament\Resources\Dues\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('loan_id')
                    ->required()
                    ->relationship('loan', 'id'),
                DatePicker::make('due_date')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('penalty_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('amount_paid')
                    ->required()
                    ->numeric(),
                TextInput::make('penalty_paid')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
