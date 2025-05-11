<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SKU;

class SkuSeeder extends Seeder
{
    public function run()
    {
        $skus = [
            // Product 1: Nike Air Zoom Men
            ['product_id' => 1, 'sku' => 'NAZM-BLK-38', 'amount_in_stock' => 50, 'color_id' => 1, 'size_id' => 1],
            ['product_id' => 1, 'sku' => 'NAZM-WHT-39', 'amount_in_stock' => 30, 'color_id' => 2, 'size_id' => 3],
            ['product_id' => 1, 'sku' => 'NAZM-BLU-40', 'amount_in_stock' => 40, 'color_id' => 4, 'size_id' => 5],
            // Product 2: Adidas Ultraboost Women
            ['product_id' => 2, 'sku' => 'AUBW-RED-38.5', 'amount_in_stock' => 40, 'color_id' => 3, 'size_id' => 2],
            ['product_id' => 2, 'sku' => 'AUBW-BLU-40', 'amount_in_stock' => 20, 'color_id' => 4, 'size_id' => 5],
            ['product_id' => 2, 'sku' => 'AUBW-WHT-39', 'amount_in_stock' => 35, 'color_id' => 2, 'size_id' => 3],
            // Product 3: Puma Velocity Kids
            ['product_id' => 3, 'sku' => 'PVK-GRN-39.5', 'amount_in_stock' => 60, 'color_id' => 5, 'size_id' => 4],
            ['product_id' => 3, 'sku' => 'PVK-YLW-41', 'amount_in_stock' => 25, 'color_id' => 6, 'size_id' => 6],
            ['product_id' => 3, 'sku' => 'PVK-BLK-38', 'amount_in_stock' => 45, 'color_id' => 1, 'size_id' => 1],
            // Product 4: Reebok Flex Men
            ['product_id' => 4, 'sku' => 'RFM-GRY-41.5', 'amount_in_stock' => 35, 'color_id' => 7, 'size_id' => 7],
            ['product_id' => 4, 'sku' => 'RFM-BLK-38', 'amount_in_stock' => 45, 'color_id' => 1, 'size_id' => 1],
            ['product_id' => 4, 'sku' => 'RFM-RED-39', 'amount_in_stock' => 30, 'color_id' => 3, 'size_id' => 3],
            // Product 5: Asics Gel Hike Women
            ['product_id' => 5, 'sku' => 'AGHW-WHT-39', 'amount_in_stock' => 50, 'color_id' => 2, 'size_id' => 3],
            ['product_id' => 5, 'sku' => 'AGHW-RED-40', 'amount_in_stock' => 30, 'color_id' => 3, 'size_id' => 5],
            ['product_id' => 5, 'sku' => 'AGHW-GRN-38.5', 'amount_in_stock' => 25, 'color_id' => 5, 'size_id' => 2],
            // Product 6: Nike Air Rapid Men
            ['product_id' => 6, 'sku' => 'NARM-BLK-38', 'amount_in_stock' => 50, 'color_id' => 1, 'size_id' => 1],
            ['product_id' => 6, 'sku' => 'NARM-WHT-39.5', 'amount_in_stock' => 30, 'color_id' => 2, 'size_id' => 4],
            ['product_id' => 6, 'sku' => 'NARM-BLU-41', 'amount_in_stock' => 40, 'color_id' => 4, 'size_id' => 6],
            // Product 7: Adidas Star Pulse Women
            ['product_id' => 7, 'sku' => 'ASPW-RED-38.5', 'amount_in_stock' => 25, 'color_id' => 3, 'size_id' => 2],
            ['product_id' => 7, 'sku' => 'ASPW-GRY-40', 'amount_in_stock' => 35, 'color_id' => 7, 'size_id' => 5],
            ['product_id' => 7, 'sku' => 'ASPW-WHT-39', 'amount_in_stock' => 20, 'color_id' => 2, 'size_id' => 3],
            // Product 8: Puma Spark Run Kids
            ['product_id' => 8, 'sku' => 'PSRK-GRN-39.5', 'amount_in_stock' => 60, 'color_id' => 5, 'size_id' => 4],
            ['product_id' => 8, 'sku' => 'PSRK-YLW-38', 'amount_in_stock' => 45, 'color_id' => 6, 'size_id' => 1],
            ['product_id' => 8, 'sku' => 'PSRK-BLK-41.5', 'amount_in_stock' => 30, 'color_id' => 1, 'size_id' => 7],
            // Product 9: Reebok Zig Train Men
            ['product_id' => 9, 'sku' => 'RZTM-BLU-40', 'amount_in_stock' => 55, 'color_id' => 4, 'size_id' => 5],
            ['product_id' => 9, 'sku' => 'RZTM-GRY-38.5', 'amount_in_stock' => 25, 'color_id' => 7, 'size_id' => 2],
            ['product_id' => 9, 'sku' => 'RZTM-RED-39', 'amount_in_stock' => 40, 'color_id' => 3, 'size_id' => 3],
            // Product 10: Asics Kayano Hike Women
            ['product_id' => 10, 'sku' => 'AKHW-WHT-41', 'amount_in_stock' => 35, 'color_id' => 2, 'size_id' => 6],
            ['product_id' => 10, 'sku' => 'AKHW-GRN-38', 'amount_in_stock' => 50, 'color_id' => 5, 'size_id' => 1],
            ['product_id' => 10, 'sku' => 'AKHW-BLK-39.5', 'amount_in_stock' => 20, 'color_id' => 1, 'size_id' => 4],
            // Product 11: Nike Fly Casual Men
            ['product_id' => 11, 'sku' => 'NFCM-YLW-38.5', 'amount_in_stock' => 45, 'color_id' => 6, 'size_id' => 2],
            ['product_id' => 11, 'sku' => 'NFCM-BLU-40', 'amount_in_stock' => 30, 'color_id' => 4, 'size_id' => 5],
            ['product_id' => 11, 'sku' => 'NFCM-GRY-41.5', 'amount_in_stock' => 25, 'color_id' => 7, 'size_id' => 7],
            // Product 12: Adidas Runfast Kids
            ['product_id' => 12, 'sku' => 'ARK-BLK-39', 'amount_in_stock' => 50, 'color_id' => 1, 'size_id' => 3],
            ['product_id' => 12, 'sku' => 'ARK-RED-38', 'amount_in_stock' => 40, 'color_id' => 3, 'size_id' => 1],
            ['product_id' => 12, 'sku' => 'ARK-WHT-39.5', 'amount_in_stock' => 35, 'color_id' => 2, 'size_id' => 4],
            // Product 13: Puma Ignite Train Women
            ['product_id' => 13, 'sku' => 'PITW-GRN-41', 'amount_in_stock' => 30, 'color_id' => 5, 'size_id' => 6],
            ['product_id' => 13, 'sku' => 'PITW-YLW-38.5', 'amount_in_stock' => 25, 'color_id' => 6, 'size_id' => 2],
            ['product_id' => 13, 'sku' => 'PITW-BLK-40', 'amount_in_stock' => 45, 'color_id' => 1, 'size_id' => 5],
            // Product 14: Reebok Nano Run Men
            ['product_id' => 14, 'sku' => 'RNRM-WHT-39', 'amount_in_stock' => 40, 'color_id' => 2, 'size_id' => 3],
            ['product_id' => 14, 'sku' => 'RNRM-BLU-41.5', 'amount_in_stock' => 35, 'color_id' => 4, 'size_id' => 7],
            ['product_id' => 14, 'sku' => 'RNRM-GRY-38', 'amount_in_stock' => 50, 'color_id' => 7, 'size_id' => 1],
            // Product 15: Asics Pulse Casual Kids
            ['product_id' => 15, 'sku' => 'APCK-RED-40', 'amount_in_stock' => 30, 'color_id' => 3, 'size_id' => 5],
            ['product_id' => 15, 'sku' => 'APCK-GRN-39.5', 'amount_in_stock' => 25, 'color_id' => 5, 'size_id' => 4],
            ['product_id' => 15, 'sku' => 'APCK-BLK-38.5', 'amount_in_stock' => 40, 'color_id' => 1, 'size_id' => 2],
        ];

        foreach ($skus as $sku) {
            Sku::create($sku);
        }
    }
}
