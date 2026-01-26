<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffDay extends Model
{
    protected $fillable = [
        'name', 'from', 'to'
    ];
}
