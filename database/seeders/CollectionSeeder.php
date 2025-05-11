<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collection;

class CollectionSeeder extends Seeder
{
    public function run()
    {
        $collections = [
            ['name' => 'New and Featured', 'slug' => 'featured'],
            ['name' => 'Men', 'slug' => 'men'],
            ['name' => 'Women', 'slug' => 'women'],
            ['name' => 'Kids', 'slug' => 'kids'],
        ];

        foreach ($collections as $collection) {
            Collection::create($collection);
        }
    }
}
