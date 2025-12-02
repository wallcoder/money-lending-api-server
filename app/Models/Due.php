<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Due extends Model
{
    protected $fillable = [
        'loadn_id', 'due_date', 'amoount', 'penalty_amount',
        'amount_paid', 'penalty_paid', 'status'
    ];

    public function loan(): BelongsTo{
        return $this->belongsTo(Loan::class);
    }



}
