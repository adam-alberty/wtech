<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function single($id)
    {
        $description = <<<EOD
These **Stylish Leather Sneakers** are the perfect blend of comfort and style. Designed for everyday wear, they feature a sleek, minimalist design that pairs well with any outfit, from casual to smart-casual. Crafted with premium leather and a durable rubber sole, these sneakers are built to last.

- **Material:** High-quality leather upper, breathable fabric lining
- **Sole:** Flexible rubber outsole for optimal grip
- **Color Options:** Black, White, Navy Blue, Charcoal Grey
- **Sizes Available:** 7, 8, 9, 10, 11, 12 (US Men’s sizes)

### **Features:**
- Soft, cushioned footbed for all-day comfort
- Lightweight design for easy wear
- Classic lace-up closure for a secure fit
- Ideal for daily use, gym sessions, or casual outings

---

### **Why You'll Love It:**
- Versatile enough to match any outfit
- Comfortable for long hours of wear
- Durable and easy to maintain
- Timeless design that never goes out of style

---
EOD;
        $product = [
            'name' => 'Nike Air Force 1',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 15099,
            'category' => 'Men\'s casual shoes',
            'htmlDescription' => Str::markdown($description)
        ];

        return view('product')->with('product', $product);
    }


    public function category($id)
    {

        $products = [
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
        return view('category')->with('products', $products);
    }
}
