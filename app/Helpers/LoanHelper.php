<?php

namespace App\Helpers;

use App\Enums\LoanStatus;

class LoanHelper
{
    public static function getColor($state)
    {
        if ($state == LoanStatus::ACTIVE->value) {
            return 'success';
        } elseif ($state == LoanStatus::CLOSED->value) {
            return 'danger';
        } else {
            return 'warning';
        }
    }
}
