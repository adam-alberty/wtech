<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'slug' => 'nike-air-zoom-men',
                'name' => 'Nike Air Zoom Men',
                'description' => 'High-performance running shoes for men.',
                'price' => 120.00,
                'brand_id' => 1,
            ],
            [
                'slug' => 'adidas-ultraboost-women',
                'name' => 'Adidas Ultraboost Women',
                'description' => 'Comfortable and stylish running shoes for women.',
                'price' => 130.00,
                'brand_id' => 2,
            ],
            [
                'slug' => 'puma-velocity-kids',
                'name' => 'Puma Velocity Kids',
                'description' => 'Durable sport shoes for kids.',
                'price' => 80.00,
                'brand_id' => 3,
            ],
            [
                'slug' => 'reebok-flex-men',
                'name' => 'Reebok Flex Men',
                'description' => 'Versatile training shoes for men.',
                'price' => 110.00,
                'brand_id' => 4,
            ],
            [
                'slug' => 'asics-gel-hike-women',
                'name' => 'Asics Gel Hike Women',
                'description' => 'Rugged hiking shoes for women.',
                'price' => 140.00,
                'brand_id' => 5,
            ],
            [
                'slug' => 'nike-air-rapid-men',
                'name' => 'Nike Air Rapid Men',
                'description' => 'Lightweight running shoes for men with superior cushioning.',
                'price' => 115.00,
                'brand_id' => 1,
            ],
            [
                'slug' => 'adidas-star-pulse-women',
                'name' => 'Adidas Star Pulse Women',
                'description' => 'Stylish casual shoes for women.',
                'price' => 90.00,
                'brand_id' => 2,
            ],
            [
                'slug' => 'puma-spark-run-kids',
                'name' => 'Puma Spark Run Kids',
                'description' => 'Vibrant running shoes for kids.',
                'price' => 75.00,
                'brand_id' => 3,
            ],
            [
                'slug' => 'reebok-zig-train-men',
                'name' => 'Reebok Zig Train Men',
                'description' => 'Durable training shoes for men.',
                'price' => 125.00,
                'brand_id' => 4,
            ],
            [
                'slug' => 'asics-kayano-hike-women',
                'name' => 'Asics Kayano Hike Women',
                'description' => 'Comfortable hiking shoes for women.',
                'price' => 135.00,
                'brand_id' => 5,
            ],
            [
                'slug' => 'nike-fly-casual-men',
                'name' => 'Nike Fly Casual Men',
                'description' => 'Versatile casual shoes for men.',
                'price' => 100.00,
                'brand_id' => 1,
            ],
            [
                'slug' => 'adidas-runfast-kids',
                'name' => 'Adidas Runfast Kids',
                'description' => 'Fast and fun running shoes for kids.',
                'price' => 70.00,
                'brand_id' => 2,
            ],
            [
                'slug' => 'puma-ignite-train-women',
                'name' => 'Puma Ignite Train Women',
                'description' => 'High-performance training shoes for women.',
                'price' => 110.00,
                'brand_id' => 3,
            ],
            [
                'slug' => 'reebok-nano-run-men',
                'name' => 'Reebok Nano Run Men',
                'description' => 'All-purpose running shoes for men.',
                'price' => 120.00,
                'brand_id' => 4,
            ],
            [
                'slug' => 'asics-pulse-casual-kids',
                'name' => 'Asics Pulse Casual Kids',
                'description' => 'Comfortable casual shoes for kids.',
                'price' => 65.00,
                'brand_id' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
