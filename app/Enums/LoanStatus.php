<?php

namespace App\Enums;

enum LoanStatus: string
{
    case ACTIVE = 'active';
    case CLOSED = 'closed';
    case DEFAULTED = 'defaulted';
}
