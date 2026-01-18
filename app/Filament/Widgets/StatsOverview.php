<?php

namespace App\Filament\Widgets;

use App\Helpers\FilamentHelper;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $users = Customer::count();
        $loans = Loan::count();
        $loans = Payment::where('status', 'paid')->count();

        return [
            Stat::make('Total Customers', FilamentHelper::formatNumber($users)),
            Stat::make('Total Loans', FilamentHelper::formatNumber($loans)),
            Stat::make('Total Successful Payments', FilamentHelper::formatNumber($loans)),
        ];
    }
}
