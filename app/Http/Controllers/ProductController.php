<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function single($slug)
    {
        $product = Product::with([
            'images' => function ($query) {
                $query->orderBy('order', 'asc');
            },
            'categories',
            'skus.color'
        ])->where('slug', $slug)->firstOrFail();

        $productData = [
            'name' => $product->name,
            'image' => $product->images->first()->path ?? '/assets/default-image.png',
            'images' => $product->images->pluck('path')->toArray(),
            'link' => "/product/{$product->slug}",
            'price' => $product->price,
            'category' => $product->categories->first()->name ?? 'Uncategorized',
            'htmlDescription' => Str::markdown($product->description ?? ''),
            'colors' => $product->skus->pluck('color')->unique('id')->map(function ($color) {
                return [
                    'id' => $color->id,
                    'name' => $color->name,
                    'code' => $color->color_code
                ];
            })->toArray(),
            'sizes' => $product->skus->pluck('size.name')->filter()->unique()->sort()->values()->toArray()
        ];

        return view('product')->with('product', $productData);
    }
}
