<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'Name' => 'Luxury',
        ]);

        Category::create([
            'Name' => 'Medium',
        ]);
        
        Category::create([
            'Name' => 'Family',
        ]);

        Category::create([
            'Name' => 'Minibus',
        ]);

        Category::create([
            'Name' => 'Electric',
        ]);
    }
}
