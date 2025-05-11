<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Running', 'slug' => 'running'],
            ['name' => 'Casual', 'slug' => 'casual'],
            ['name' => 'Training', 'slug' => 'training'],
            ['name' => 'Hiking', 'slug' => 'hiking'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
