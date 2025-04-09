<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collection($slug)
    {
        $collection = Collection::where('slug', $slug)->firstOrFail();

        // Fetch categories for the sidebar
        $categories = Category::all();

        $selectedCategorySlug = request()->query('category');
        $sort = request()->query('sort', 'top'); // Default sort by top

        $productsQuery = Product::whereHas('collections', function ($query) use ($collection) {
            $query->where('collection_id', $collection->id);
        });

        // Filter by category
        if ($selectedCategorySlug) {
            $productsQuery->whereHas('categories', function ($query) use ($selectedCategorySlug) {
                $query->where('slug', $selectedCategorySlug);
            });
        }

        // Eager load
        $productsQuery->with(['images', 'skus', 'categories']);

        switch ($sort) {
            case 'newest':
                $productsQuery->orderBy('created_at', 'desc');
                break;
            case 'cheapest':
                $productsQuery->select('products.*')
                    ->selectRaw('(SELECT MIN(price) FROM skus WHERE skus.product_id = products.id) as min_price')
                    ->orderBy('min_price', 'asc');
                break;
            case 'most-expensive':
                $productsQuery->select('products.*')
                    ->selectRaw('(SELECT MAX(price) FROM skus WHERE skus.product_id = products.id) as max_price')
                    ->orderBy('max_price', 'desc');
                break;
            case 'top':
            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }
        $products = $productsQuery->get();

        $products = $products->map(function ($product) {
            $sku = $product->skus->first(); // TODO: another method to choose sku
            return [
                'link' => "/product/{$product->slug}",
                'image' => $product->images->first()->path ?? '/default-image.jpg',
                'name' => $product->name,
                'category' => $product->categories->first()->name ?? 'Uncategorized',
                'price' => $sku->price,
            ];
        });

        return view('category', compact('collection',
            'categories', 'products', 'sort', 'selectedCategorySlug'));
    }
}
