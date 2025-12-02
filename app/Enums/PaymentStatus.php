<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PAID = 'paid';
    case ATTEMPTED = 'attempted';
    case FAILED = 'failed';
}
