<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    public function run()
    {
        $paymentTypes = [
            ['name' => 'Credit Card', 'price' => 0.00],
            ['name' => 'PayPal', 'price' => 0.00],
            ['name' => 'Cash on Delivery', 'price' => 2.50],
            ['name' => 'Bank Transfer', 'price' => 1.00],
        ];

        foreach ($paymentTypes as $paymentType) {
            PaymentType::create($paymentType);
        }
    }
}
