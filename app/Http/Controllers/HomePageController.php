<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $new_arrivals = [
            [
                'name' => 'Nike Air Force 1',
                'image' => '/assets/product-1.png',
                'link' => '/product/nike-air-force-1',
                'price' => 9099,
                'category' => 'Men\'s running shoes',
            ],
            [
                'name' => 'Adidas Ultraboost',
                'image' => '/assets/product-2.png',
                'link' => '/product/air',
                'price' => 15099,
                'category' => 'Men\'s running shoes',
            ],
            [
                'name' => 'Converse Chuck Taylor All-Star',
                'image' => '/assets/product-3.png',
                'link' => '/product/air',
                'price' => 7599,
                'category' => 'Men\'s running shoes',
            ],
            [
                'name' => 'Jordan 1 Retro',
                'image' => '/assets/product-4.png',
                'link' => '/product/air',
                'price' => 13999,
                'category' => 'Men\'s running shoes',
            ],
        ];

        $most_popular = [
            [
                'name' => 'Yeezy Boost 350',
                'image' => '/assets/product-5.png',
                'link' => '/product/air',
                'price' => 24799,
                'category' => 'Men\'s running shoes',
            ],
            [
                'name' => 'New Balance 990',
                'image' => '/assets/product-6.png',
                'link' => '/product/air',
                'price' => 18099,
                'category' => 'Men\'s running shoes',
            ],
            [
                'name' => 'Puma Suede Classic',
                'image' => '/assets/product-7.png',
                'link' => '/product/air',
                'price' => 7000,
                'category' => 'Men\'s running shoes',
            ],
            [
                'name' => 'Vans Old Skool',
                'image' => '/assets/product-8.png',
                'link' => '/product/air',
                'price' => 6599,
                'category' => 'Men\'s running shoes',
            ],

        ];
        return view('index')->with('new_arrivals', $new_arrivals)->with('most_popular', $most_popular);
    }
}
