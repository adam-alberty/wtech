<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['name' => '38'],
            ['name' => '38.5'],
            ['name' => '39'],
            ['name' => '39.5'],
            ['name' => '40'],
            ['name' => '41'],
            ['name' => '41.5'],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
