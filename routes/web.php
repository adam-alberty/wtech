<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $new_arrivals = [
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
    ];

    $most_popular = [
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],
        [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ],

    ];

    return view('index')->with('new_arrivals', $new_arrivals)->with('most_popular', $most_popular);
})->name('home');
