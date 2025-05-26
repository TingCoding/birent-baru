<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'Name' => 'BMW 330i',
            'Subtitle' => 'Arctic Race Blue Metallic',
            'Passengers' => 5,
            'Seats' => 4,
            'Bags' => 1,
            'Luggages' => 1,
            'Price' => 2500000,
            'Description' => 'This BMW 330i uses an automatic transmission (matic) and has a powerful engine performance.
It is recommended to use high-octane fuel RON 95 and above, such as Pertamax Turbo or Shell V-Power to maintain the performance and efficiency of the turbo engine.',
            'Photo' => 'BMW.jpeg',
            'CategoryId' => 1,
            'CategoryName' => 'Luxury'
        ]);

        Car::create([
            'Name' => 'Honda HRV',
            'Subtitle' => 'Black',
            'Passengers' => 5,
            'Seats' => 5,
            'Bags' => 3,
            'Luggages' => 2,
            'Price' => 600000,
            'Description' => 'This Honda HR-V vehicle uses an automatic transmission (matic). To maintain engine performance, it is recommended to use fuel of at least RON 92 (such as Pertamax or equivalent).',
            'Photo' => 'Honda HR-V black.jpeg',
            'CategoryId' => 2,
            'CategoryName' => 'Medium'
        ]);

        Car::create([
            'Name' => 'Toyota Avanza',
            'Subtitle' => 'Gray Metallic',
            'Passengers' => 7,
            'Seats' => 5,
            'Bags' => 2,
            'Luggages' => 2,
            'Price' => 400000,
            'Description' => 'This Toyota Avanza vehicle uses a manual transmission. It is recommended to use fuel of at least RON 90 such as Pertalite, or RON 92 such as Pertamax to maintain optimal engine performance.',
            'Photo' => 'Honda HR-V black.jpeg',
            'CategoryId' => 3,
            'CategoryName' => 'Family'
        ]);

        Car::create([
            'Name' => 'Toyota HIACE',
            'Subtitle' => 'White',
            'Passengers' => 15,
            'Seats' => 4,
            'Bags' => 4,
            'Luggages' => 3,
            'Price' => 1000000,
            'Description' => 'This Toyota HiAce vehicle uses a manual transmission. It is recommended to use diesel fuel (biosolar or Dexlite) depending on the engine type.',
            'Photo' => 'Toyota HIACE.jpeg',
            'CategoryId' => 4,
            'CategoryName' => 'Minibus'
        ]);

        Car::create([
            'Name' => 'Wuling Air-ev',
            'Subtitle' => 'Galaxy Blue',
            'Passengers' => 4,
            'Seats' => 3,
            'Bags' => 1,
            'Luggages' => 1,
            'Price' => 400000,
            'Description' => 'Wuling Air EV is a full battery electric car (EV) with automatic transmission (matic). It does not require gasoline/diesel fuel, it only needs to be charged using PLN electricity or SPKLU (Public Electric Vehicle Charging Station).',
            'Photo' => 'Wuling Air-ev.jpeg',
            'CategoryId' => 5,
            'CategoryName' => 'Electric'
        ]);
    }
}
