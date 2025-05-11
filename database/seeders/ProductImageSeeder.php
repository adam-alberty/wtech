<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $productImages = [
            ['product_id' => 1, 'path' => 'product_images/example_1.jpeg', 'order' => 1],
            ['product_id' => 1, 'path' => 'product_images/example_1_1.jpeg', 'order' => 2],
            ['product_id' => 2, 'path' => 'product_images/example_2.jpeg', 'order' => 1],
            ['product_id' => 2, 'path' => 'product_images/example_2_1.jpeg', 'order' => 2],
            ['product_id' => 3, 'path' => 'product_images/example_3.jpeg', 'order' => 1],
            ['product_id' => 3, 'path' => 'product_images/example_3_1.jpeg', 'order' => 2],
            ['product_id' => 4, 'path' => 'product_images/example_4.jpeg', 'order' => 1],
            ['product_id' => 4, 'path' => 'product_images/example_4_1.jpeg', 'order' => 2],
            ['product_id' => 5, 'path' => 'product_images/example_5.jpeg', 'order' => 1],
            ['product_id' => 6, 'path' => 'product_images/example_6.jpeg', 'order' => 1],
            ['product_id' => 7, 'path' => 'product_images/example_7.jpeg', 'order' => 1],
            ['product_id' => 7, 'path' => 'product_images/example_7_1.jpeg', 'order' => 2],
            ['product_id' => 8, 'path' => 'product_images/example_8.jpeg', 'order' => 1],
            ['product_id' => 9, 'path' => 'product_images/example_9.jpeg', 'order' => 1],
            ['product_id' => 10, 'path' => 'product_images/example_10.jpeg', 'order' => 1],
            ['product_id' => 11, 'path' => 'product_images/example_11.jpeg', 'order' => 1],
            ['product_id' => 11, 'path' => 'product_images/example_11_1.jpeg', 'order' => 2],
            ['product_id' => 12, 'path' => 'product_images/example_12.jpeg', 'order' => 1],
            ['product_id' => 12, 'path' => 'product_images/example_12_1.jpeg', 'order' => 2],
            ['product_id' => 13, 'path' => 'product_images/example_13.jpeg', 'order' => 1],
            ['product_id' => 13, 'path' => 'product_images/example_13_1.jpeg', 'order' => 2],
            ['product_id' => 14, 'path' => 'product_images/example_14.jpeg', 'order' => 1],
            ['product_id' => 14, 'path' => 'product_images/example_14_1.jpeg', 'order' => 2],
            ['product_id' => 14, 'path' => 'product_images/example_14_2.jpeg', 'order' => 3],
            ['product_id' => 15, 'path' => 'product_images/example_15.jpeg', 'order' => 1],
            ['product_id' => 15, 'path' => 'product_images/example_15_1.jpeg', 'order' => 2],
            ['product_id' => 15, 'path' => 'product_images/example_15_2.jpeg', 'order' => 3],
        ];

        foreach ($productImages as $productImage) {
            ProductImage::create($productImage);
        }
    }
}
