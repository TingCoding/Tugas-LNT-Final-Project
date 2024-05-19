<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Shipment::create([
            'ShipmentType' => 'Regular',
            'Estimation' => 3,
            'Cost' => 10000,
            'MaxQuantity' => 5
        ]);

        \App\Models\Shipment::create([
            'ShipmentType' => 'Instant',
            'Estimation' => 1,
            'Cost' => 30000,
            'MaxQuantity' => 5
        ]);
    }
}
