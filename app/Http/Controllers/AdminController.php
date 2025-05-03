<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_products()
    {
        $products = Product::all();
        return view('admin.products')->with('products', $products);
    }

    public function view_create_product()
    {
        return view('admin.products.create');
    }
}
