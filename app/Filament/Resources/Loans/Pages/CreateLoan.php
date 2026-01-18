<?php

namespace App\Filament\Resources\Loans\Pages;

use App\Filament\Resources\Loans\LoanResource;
use App\Helpers\FilamentHelper;
use App\Models\Due;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;

class CreateLoan extends CreateRecord
{
    protected static string $resource = LoanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['reference_no'] = FilamentHelper::generateLoanRefNo();

        return $data;
    }

    protected function afterCreate(): void
    {
        $loan = $this->record;
        $data = $this->data;

        // dd($loan->id);

        $days = Carbon::parse($data['start_date'])
            ->diffInDays(Carbon::parse($data['end_date'])) + 1;
        $start = Carbon::parse($data['start_date']);

        $dailyAmount = $loan->total_amount / $days;

        for ($i = 0; $i < $days; $i++) {
            Due::create([
                'loan_id' => $loan->id,
                'due_date' => $start->copy()->addDays($i),
                'amount' => $dailyAmount,
                'penalty_amount' => 0,
                'amount_paid' => 0,
                'penalty_paid' => 0,
                'status' => 'unpaid',
            ]);
        }
    }
}
