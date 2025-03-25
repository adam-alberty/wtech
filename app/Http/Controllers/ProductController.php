<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index($id)
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
            'name' => 'Nike Air Force 1 Max',
            'image' => '/assets/product-image.jpg',
            'link' => '/products/air',
            'price' => 193.35,
            'category' => 'Men\'s running shoes',
            'htmlDescription' => Str::markdown($description)
        ];

        return view('product')->with('product', $product);
    }
}
