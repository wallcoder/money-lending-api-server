<?php

namespace App\Enums;

enum LoanFrequency: string
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case yearly = 'yearly';
}
