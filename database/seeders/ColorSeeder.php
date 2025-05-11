<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            ['name' => 'Black', 'color_code' => '#000000'],
            ['name' => 'White', 'color_code' => '#FFFFFF'],
            ['name' => 'Red', 'color_code' => '#FF0000'],
            ['name' => 'Blue', 'color_code' => '#0000FF'],
            ['name' => 'Green', 'color_code' => '#008000'],
            ['name' => 'Yellow', 'color_code' => '#FFFF00'],
            ['name' => 'Grey', 'color_code' => '#808080'],
        ];

        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
