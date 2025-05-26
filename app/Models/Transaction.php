<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rental_id',
        'transaction_number',
        'rental_days',
        'total_payment',
        'rental_period',
        'status',
        'paid_at'
    ];

    protected $casts = [
        'total_payment' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Rental
     */
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}