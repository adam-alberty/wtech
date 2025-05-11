<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $productCategories = [
            ['product_id' => 1, 'category_id' => 1], // Nike Air Zoom Men -> Running
            ['product_id' => 2, 'category_id' => 1], // Adidas Ultraboost Women -> Running
            ['product_id' => 3, 'category_id' => 3], // Puma Velocity Kids -> Training
            ['product_id' => 4, 'category_id' => 3], // Reebok Flex Men -> Training
            ['product_id' => 5, 'category_id' => 4], // Asics Gel Hike Women -> Hiking
            ['product_id' => 6, 'category_id' => 1], // Nike Air Rapid Men -> Running
            ['product_id' => 7, 'category_id' => 2], // Adidas Star Pulse Women -> Casual
            ['product_id' => 8, 'category_id' => 1], // Puma Spark Run Kids -> Running
            ['product_id' => 9, 'category_id' => 3], // Reebok Zig Train Men -> Training
            ['product_id' => 10, 'category_id' => 4], // Asics Kayano Hike Women -> Hiking
            ['product_id' => 11, 'category_id' => 2], // Nike Fly Casual Men -> Casual
            ['product_id' => 12, 'category_id' => 1], // Adidas Runfast Kids -> Running
            ['product_id' => 13, 'category_id' => 3], // Puma Ignite Train Women -> Training
            ['product_id' => 14, 'category_id' => 1], // Reebok Nano Run Men -> Running
            ['product_id' => 15, 'category_id' => 2], // Asics Pulse Casual Kids -> Casual
        ];

        foreach ($productCategories as $productCategory) {
            $product = Product::find($productCategory['product_id']);
            $product->categories()->attach($productCategory['category_id']);
        }
    }
}
