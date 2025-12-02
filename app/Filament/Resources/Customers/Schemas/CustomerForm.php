<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->placeholder('Select User')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('full_name')
                    ->placeholder('Enter Full Name')
                    ->required(),
                TextInput::make('phone')
                    ->placeholder('Enter Phone')
                    ->tel()
                    ->required(),
                TextInput::make('address')
                    ->placeholder('Enter Address')
                    ->required(),
            ]);
    }
}
