<?php

namespace App\Helpers;

use App\Enums\PaymentStatus;

class PaymentHelper
{
    public static function getColor($state)
    {
        if ($state == PaymentStatus::PAID->value) {
            return 'success';
        } elseif ($state == PaymentStatus::FAILED->value) {
            return 'danger';
        } else {
            return 'warning';
        }
    }
}
