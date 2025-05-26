<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Subtitle',
        'Passengers',
        'Seats',
        'Bags',
        'Luggages',
        'Price',
        'Description',
        'Photo',
        'CategoryId',
        'CategoryName'
    ];

    // Cast attributes to appropriate types
    protected $casts = [
        'Passengers' => 'integer',
        'Seats' => 'integer',
        'Bags' => 'integer',
        'Luggages' => 'integer',
        'Price' => 'integer',
        'CategoryId' => 'integer',
    ];

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId');
    }

    // Tambahkan relationships ini ke model Car yang sudah ada

    /**
     * Relationship with Rentals
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}