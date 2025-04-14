<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        // New Arrivals
        $products = Product::with(['categories', 'images' => function ($query) {
            $query->where('order', 1);
        }])
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('skus')
                    ->whereColumn('skus.product_id', 'products.id')
                    ->where('amount_in_stock', '>', 0);
            })
            ->latest('created_at')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $new_arrivals = $products->map(function ($product) {
            return [
                'link' => "/product/{$product->slug}",
                'image' => $product->images->first()->path ?? '/assets/default-image.png',
                'name' => $product->name,
                'category' => $product->categories->first()->name ?? 'Uncategorized',
                'price' => $product->price ?? 0,
            ];
        })->toArray();

        $most_popular_products = Product::with(['categories', 'images' => function ($query) {
            $query->where('order', 1);
        }])
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('skus')
                      ->whereColumn('skus.product_id', 'products.id')
                      ->where('amount_in_stock', '>', 0);
            })
            ->join('skus', 'products.id', '=', 'skus.product_id')
            ->leftJoin('order_item', 'skus.id', '=', 'order_item.sku_id')
            ->select('products.*')
            ->selectRaw('COALESCE(SUM(order_item.quantity), 0) as total_quantity')
            ->groupBy('products.id', 'products.name', 'products.slug', 'products.created_at',
                    'products.updated_at', 'products.price', 'products.brand_id')
            ->orderBy('total_quantity', 'desc')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $most_popular = $most_popular_products->map(function ($product) {
            return [
                'link' => "/product/{$product->slug}",
                'image' => $product->images->first()->path ?? '/assets/default-image.png',
                'name' => $product->name,
                'category' => $product->categories->first()->name ?? 'Uncategorized',
                'price' => $product->price ?? 0,
            ];
        })->toArray();

        return view('index')->with('new_arrivals', $new_arrivals)->with('most_popular', $most_popular);
    }
}
