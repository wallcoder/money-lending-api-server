<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'loan_id', 'customer_id', 'reference_order_id',
        'reference_payment_id', 'paid_at', 'status', 'allocation'
    ];

    protected $casts = [
        'allocation' => 'array'
    ];


    public function loan(): BelongsTo{
        return $this->belongsTo(Loan::class);
    }

    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class);
    }
}
