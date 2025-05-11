<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BrandSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            CategorySeeder::class,
            CollectionSeeder::class,
            ProductSeeder::class,
            SkuSeeder::class,
            ProductCategorySeeder::class,
            CollectionProductSeeder::class,
            DeliveryTypeSeeder::class,
            PaymentTypeSeeder::class,
            ProductImageSeeder::class,
            UserSeeder::class,
        ]);

    }
}
