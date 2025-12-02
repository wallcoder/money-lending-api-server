<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('loan_id')
                    ->relationship('loan', 'id'),
                Select::make('customer_id')
                    ->relationship('customer', 'id'),
                TextInput::make('reference_order_id')
                    ->required(),
                TextInput::make('reference_payment_id'),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('paid_at')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                Textarea::make('allocation')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
