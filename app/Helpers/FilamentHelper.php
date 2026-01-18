<?php

namespace App\Helpers;

use App\Models\Loan;
use Carbon\Carbon;

class FilamentHelper
{
    public static function formatNumber($num)
    {
        if ($num === null || $num === '') {
            return '0';
        }

        $num = (float) $num;

        $decimal = '';
        if (strpos((string) $num, '.') !== false) {
            [$num, $decimal] = explode('.', (string) $num);
            $decimal = '.'.substr($decimal, 0, 2);
        }

        $num = (string) $num;
        $lastThree = substr($num, -3);
        $restUnits = substr($num, 0, -3);

        if ($restUnits !== '') {
            $restUnits = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $restUnits);

            return $restUnits.','.$lastThree.$decimal;
        }

        return $lastThree.$decimal;
    }

    public static function generateLoanRefNo(): string
    {
        $year = Carbon::now()->format('y');
        $prefix = "EILN{$year}";

        $latestLoan = Loan::where('reference_no', 'like', "{$prefix}%")
            ->orderByDesc('reference_no')
            ->first();

        if ($latestLoan) {
            $lastNumber = (int) substr($latestLoan->loan_ref_no, -4);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        return $prefix.str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
