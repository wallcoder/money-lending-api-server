<?php

namespace App\Filament\Resources\Payments\Schemas;

use App\Helpers\PaymentHelper;
use App\Models\Payment;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('loan.id')
                    ->label('Loan')
                    ->placeholder('-'),
                TextEntry::make('customer.id')
                    ->label('Customer')
                    ->placeholder('-'),
                TextEntry::make('reference_order_id'),
                TextEntry::make('reference_payment_id')
                    ->placeholder('-'),
                TextEntry::make('amount')
                    ->money(),
                TextEntry::make('paid_at')
                    ->dateTime(),
                TextEntry::make('status')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->color(fn ($state) => PaymentHelper::getColor($state))
                    ->badge()
                    ->searchable(),
                TextEntry::make('allocation')
                    ->columnSpanFull(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Payment $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
