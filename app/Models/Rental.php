<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'PhoneNumber',
        'Address',
        'StartDate',
        'EndDate',
        'IDCard',
        'DriverLicense',
        'status'
    ];

    protected $casts = [
        'StartDate' => 'date',
        'EndDate' => 'date',
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Car
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Relationship with Transaction
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}