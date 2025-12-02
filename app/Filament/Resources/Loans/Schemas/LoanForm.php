<?php

namespace App\Filament\Resources\Loans\Schemas;

use App\Enums\LoanFrequency;
use App\Enums\LoanStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    Select::make('customer_id')
                        ->relationship('customer', 'full_name')
                        ->preload()
                        ->placeholder('Select Customer')
                        ->searchable()
                        ->required(),
                    TextInput::make('principal')
                        ->helperText('Puk zat')
                        ->minValue(0)
                        ->placeholder('Enter Principal Amount(Puk zat)')
                        ->required()
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (callable $get, callable $set) => static::calculate($get, $set)),
                    TextInput::make('total_interest')
                        ->disabled()
                        ->helperText('Hlep zat')
                        ->minValue(0)
                        ->default(0)
                        ->dehydrated()
                        ->required()
                        ->numeric(),
                    TextInput::make('rate')
                        ->placeholder('Enter Interest Rate')
                        ->helperText('Interest Rate')
                        ->minValue(0)
                        ->maxValue(100)
                        ->required()
                        ->live(onBlur: true)
                        ->numeric()
                        ->afterStateUpdated(fn (callable $get, callable $set) => static::calculate($get, $set)),
                    TextInput::make('total_amount')
                        ->required()
                        ->default(0)
                        ->minValue(0)
                        ->disabled()
                        ->dehydrated()
                        ->numeric(),
                    DatePicker::make('start_date')
                        ->default(now())
                        ->required(),
                        // ->rules(['before_or_equal:end_date']),

                    DatePicker::make('end_date')
                        ->required(),
                        // ->rules(['after_or_equal:start_date']),

                    Select::make('frequency')
                        ->options(LoanFrequency::class)
                        ->default('daily')
                        ->required(),
                    Select::make('status')
                        ->options(LoanStatus::class)
                        ->default('active')
                        ->required(),
                ])->columnSpanFull()->columns(2),

            ]);
    }

    public static function calculate(callable $get, callable $set)
    {
        $principal = $get('principal');
        $rate = $get('rate');
        $interest = $principal * ($rate / 100);
        $total = $principal + $interest;

        $set('total_interest', $interest);
        $set('total_amount', $total);
    }
}
