<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
    $new_arrivals = [
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
    ];

    $most_popular = [
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 0 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/product/air',
            'price' => 192.35,
            'category' => 'Men\'s running shoes',
        ],

    ];
    return view('index')->with('new_arrivals', $new_arrivals)->with('most_popular', $most_popular);
    }
}
