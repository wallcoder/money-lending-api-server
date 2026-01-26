<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class UserChart extends ChartWidget
{
    protected ?string $heading = 'User Chart';

    protected function getData(): array
    {
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subMonths(11);

        // Generate last 12 months labels
        $months = collect(range(0, 11))
            ->map(fn ($i) => $startDate->copy()->addMonths($i)->format('Y-m'))
            ->toArray();

        // Get user counts grouped by month
        $counts = User::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Fill missing months with 0
        $data = array_map(
            fn ($month) => $counts[$month] ?? 0,
            $months
        );

        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
