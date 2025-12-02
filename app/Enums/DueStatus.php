<?php

namespace App\Enums;

enum DueStatus: string
{
    case PAID = 'paid';
    case PARTIAL = 'partial';
    case UNPAID = 'unpaid';
}
