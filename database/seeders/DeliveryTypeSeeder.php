<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryType;

class DeliveryTypeSeeder extends Seeder
{
    public function run()
    {
        $deliveryTypes = [
            ['name' => 'Standard Shipping', 'price' => 5.99],
            ['name' => 'Express Shipping', 'price' => 12.99],
            ['name' => 'Overnight Shipping', 'price' => 24.99],
            ['name' => 'In-Store Pickup', 'price' => 0.00],
        ];

        foreach ($deliveryTypes as $deliveryType) {
            DeliveryType::create($deliveryType);
        }
    }
}
