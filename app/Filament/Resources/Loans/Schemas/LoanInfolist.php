<?php

namespace App\Filament\Resources\Loans\Schemas;

use App\Helpers\LoanHelper;
use App\Models\Loan;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LoanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextEntry::make('customer.full_name')
                        ->label('Customer'),
                    TextEntry::make('reference_no'),
                    TextEntry::make('principal')
                        ->money(),

                    TextEntry::make('total_interest')
                        ->money(),

                    TextEntry::make('start_date')
                        ->date(),
                    TextEntry::make('end_date')
                        ->date(),
                    TextEntry::make('frequency'),
                    TextEntry::make('status')
                        ->badge()
                        ->color(fn ($state) => LoanHelper::getColor($state))
                        ->formatStateUsing(fn ($state) => ucfirst($state)),
                    TextEntry::make('deleted_at')
                        ->dateTime()
                        ->visible(fn (Loan $record): bool => $record->trashed()),
                    TextEntry::make('created_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('updated_at')
                        ->dateTime()
                        ->placeholder('-'),
                ])->columnSpanFull()->columns(3),

            ]);
    }
}
