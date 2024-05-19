<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Stock::create([
            'Category' => 'Stock',
            'Name' => 'Nicole',
            'Price' => 500000,
            'Quantity' => 20,
            'Photo' => fake()->image(),
            'CategoryId' => 1
        ]);

        \App\Models\Stock::create([
            'Category' => 'Stock2',
            'Name' => 'Nicole Jojo',
            'Price' => 500000,
            'Quantity' => 20,
            'Photo' => fake()->image(),
            'CategoryId' => 2
        ]);
    }
}
