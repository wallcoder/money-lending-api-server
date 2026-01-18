<?php

namespace App\Helpers;

use App\Enums\DueStatus;

class DueHelper
{
    public static function getColor($state)
    {
        if ($state == DueStatus::PAID->value) {
            return 'success';
        } elseif ($state == DueStatus::UNPAID->value) {
            return 'danger';
        } else {
            return 'warning';
        }
    }
}
