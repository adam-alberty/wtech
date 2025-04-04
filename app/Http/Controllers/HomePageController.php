<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')
            ->latest()
            ->take(4)
            ->get();

        $new_arrivals = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'image' => $product->image->path,
                'link' => "/product/{$product->slug}",
                'price' => $product->sku->price,
                'category' => $product->categories->first()->name,
            ];
        })->toArray();

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
