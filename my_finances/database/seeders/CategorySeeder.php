<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()
            ->count(12)
            ->sequence(
                ['category' => 'Shopping'],
                ['category' => 'Food'],
                ['category' => 'Clothes'],
                ['category' => 'Supplements'],
                ['category' => 'Gym'],
                ['category' => 'Junk Food'],
                ['category' => 'Eating and Drinking Out'],
                ['category' => 'Bills'],
                ['category' => 'Rent'],
                ['category' => 'Car Expenses'],
                ['category' => 'Travel'],
                ['category' => 'Medicine'],
            )
            ->create();
    }
}
