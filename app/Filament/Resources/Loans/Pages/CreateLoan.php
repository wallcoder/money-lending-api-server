<?php

namespace App\Filament\Resources\Loans\Pages;

use App\Filament\Resources\Loans\LoanResource;
use App\Models\Due;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;

class CreateLoan extends CreateRecord
{
    protected static string $resource = LoanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function afterCreate(): void
    {
        $loan = $this->record;
        $data = $this->data;

        $days = (int) $data['days'];
        $startDate = Carbon::parse($data['start_date']);

        $dailyAmount = $loan->total_amount / $days;

        $currentDate = $startDate->copy();
        
        $offDays = \App\Models\OffDay::all();

        for ($i = 0; $i < $days; $i++) {
            // Skip off days
            while ($this->isOffDay($currentDate, $offDays)) {
                $currentDate->addDay();
            }

            Due::create([
                'loan_id' => $loan->id,
                'due_date' => $currentDate->copy()->format('Y-m-d'),
                'amount' => $dailyAmount,
                'penalty_amount' => 0,
                'amount_paid' => 0,
                'penalty_paid' => 0,
                'status' => 'unpaid',
            ]);

            $currentDate->addDay();
        }
    }

    protected function isOffDay(Carbon $date, $offDays): bool
    {
        $dateString = $date->format('Y-m-d');
        
        foreach ($offDays as $offDay) {
            if ($dateString >= $offDay->from && $dateString <= $offDay->to) {
                return true;
            }
        }
        
        return false;
    }
}
