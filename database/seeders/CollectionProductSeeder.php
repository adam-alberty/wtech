<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class CollectionProductSeeder extends Seeder
{
    public function run()
    {
        $collectionProducts = [
     ['collection_id' => 2, 'product_id' => 1], // Men -> Nike Air Zoom Men
    ['collection_id' => 3, 'product_id' => 2], // Women -> Adidas Ultraboost Women
    ['collection_id' => 4, 'product_id' => 3], // Kids -> Puma Velocity Kids
    ['collection_id' => 2, 'product_id' => 4], // Men -> Reebok Flex Men
    ['collection_id' => 3, 'product_id' => 5], // Women -> Asics Gel Hike Women
    ['collection_id' => 2, 'product_id' => 6], // Men -> Nike Air Rapid Men
    ['collection_id' => 3, 'product_id' => 7], // Women -> Adidas Star Pulse Women
    ['collection_id' => 4, 'product_id' => 8], // Kids -> Puma Spark Run Kids
    ['collection_id' => 2, 'product_id' => 9], // Men -> Reebok Zig Train Men
    ['collection_id' => 3, 'product_id' => 10], // Women -> Asics Kayano Hike Women
    ['collection_id' => 2, 'product_id' => 11], // Men -> Nike Fly Casual Men
    ['collection_id' => 4, 'product_id' => 12], // Kids -> Adidas Runfast Kids
    ['collection_id' => 3, 'product_id' => 13], // Women -> Puma Ignite Train Women
    ['collection_id' => 2, 'product_id' => 14], // Men -> Reebok Nano Run Men
    ['collection_id' => 4, 'product_id' => 15], // Kids -> Asics Pulse Casual Kids
    ['collection_id' => 1, 'product_id' => 7], // New and Featured -> Nike Air Zoom Men
    ['collection_id' => 1, 'product_id' => 9], // New and Featured -> Adidas Ultraboost Women
    ['collection_id' => 1, 'product_id' => 8], // New and Featured -> Puma Spark Run Kids
    ['collection_id' => 1, 'product_id' => 11], // New and Featured -> Nike Fly Casual Men

            ['collection_id' => 1, 'product_id' => 5],
            ['collection_id' => 1, 'product_id' => 6],
            ['collection_id' => 1, 'product_id' => 4],
            ['collection_id' => 1, 'product_id' => 3],
            ['collection_id' => 1, 'product_id' => 2],
            ['collection_id' => 1, 'product_id' => 1],
            ['collection_id' => 1, 'product_id' => 15],
            ['collection_id' => 1, 'product_id' => 14],
            ['collection_id' => 1, 'product_id' => 13],
            ['collection_id' => 1, 'product_id' => 12],
        ];

        foreach ($collectionProducts as $collectionProduct) {
            $product = Product::find($collectionProduct['product_id']);
            $product->collections()->attach($collectionProduct['collection_id']);
        }
    }
}
