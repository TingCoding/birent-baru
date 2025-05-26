<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name'
        // 'Passengers',
        // 'Seats',
        // 'Bags',
        // 'Luggages',
        // 'Photo'
    ];

    // Cast attributes to appropriate types
    // protected $casts = [
    //     'Passengers' => 'integer',
    //     'Seats' => 'integer',
    //     'Bags' => 'integer',
    //     'Luggages' => 'integer',
    // ];

    // Define relationship with Cars
    public function cars()
    {
        return $this->hasMany(Car::class, 'CategoryId');
    }
}