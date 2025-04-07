<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories', 'images' => function ($query) {
            $query->where('order', 1);
        }])
            ->latest()
            ->take(4)
            ->get();


        $new_arrivals = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'image' => $product->images->first()->path,
                'link' => "/product/{$product->slug}",
                'price' => $product->skus->min('price'),
                'category' => $product->categories->first()->name,
            ];
        })->toArray();


        $most_popular_products = Product::with(['categories', 'images' => function ($query) {
            $query->where('order', 1);
        }])
            ->join('skus', 'products.id', '=', 'skus.product_id')
            ->leftJoin('order_item', 'skus.id', '=', 'order_item.sku_id')
            ->select('products.*')
            ->selectRaw('COALESCE(SUM(order_item.quantity), 0) as total_quantity')
            ->groupBy('products.id', 'products.name', 'products.slug', 'products.created_at', 'products.updated_at')
            ->orderBy('total_quantity', 'desc')
            ->take(4)
            ->get();

        $most_popular = $most_popular_products->map(function ($product) {
            return [
                'name' => $product->name,
                'image' => $product->images->first()->path,
                'link' => "/product/{$product->slug}",
                'price' => $product->skus->min('price'),
                'category' => $product->categories->first()->name,
            ];
        })->toArray();


        return view('index')->with('new_arrivals', $new_arrivals)->with('most_popular', $most_popular);
    }
}
