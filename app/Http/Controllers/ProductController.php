<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id) {
        $product = [
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
        ];

        return view('product')->with('product', $product);
    }
}
