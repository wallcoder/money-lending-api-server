<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id',
        'principal',
        'total_interest',
        'total_amount',
        'start_date',
        'end_date',
        'frequency',
        'rate',
        'status'
    ];

    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class);
    }

    public function payments(): HasMany{
        return $this->hasMany(Payment::class);
    }

    public function dues(): HasMany{
        return $this->hasMany(Due::class);
    }
}
