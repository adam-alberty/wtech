<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collection($slug = null)
    {
        $collection = null;
        if ($slug) {
            $collection = Collection::where('slug', $slug)->firstOrFail();
        } else {
            // Show all collections
            $collection = Collection::all();
            $collection->name = "All Products";
            $collection->slug = "/";
        }


        // Fetch all categories, brands, and colors for the sidebar
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();

        $selected_category = request()->query('category');
        $selected_brands = array_filter((array) request()->query('brand', []));
        $selected_colors = array_filter((array) request()->query('color', []));
        $price_from = request()->query('price_from');
        $price_to = request()->query('price_to');
        $sort = request()->query('sort', 'top');

        $products_query = Product::query();

        if ($slug) {
            $products_query = Product::whereHas('collections', function ($query) use ($collection) {
                $query->where('collection_id', $collection->id);
            });
        } else {
            $products_query->whereHas('collections', function ($query) {
                $query->whereIn('collection_id', Collection::pluck('id'));
            });

        }

        // Filter by category
        if ($selected_category) {
            $products_query->whereHas('categories', function ($query) use ($selected_category) {
                $query->where('slug', $selected_category);
            });
        }

        // Filter by brands
        if (!empty($selected_brands)) {
            $products_query->whereIn('brand_id', $selected_brands);
        }

        // Filter by colors
        if (!empty($selected_colors)) {
            $products_query->whereHas('skus', function ($query) use ($selected_colors) {
                $query->whereIn('color_id', $selected_colors);
            });
        }

        // Filter by price
        if ($price_from || $price_to) {
            $products_query->whereHas('skus', function ($query) use ($price_from, $price_to) {
                if ($price_from && is_numeric($price_from) && $price_from >= 0) {
                    $query->where('price', '>=', $price_from);
                }
                if ($price_to && is_numeric($price_to) && $price_to >= 0) {
                    $query->where('price', '<=', $price_to);
                }
            });
        }

        // Eager load
        $products_query->with(['images', 'skus', 'categories', 'brand']);

        switch ($sort) {
            case 'newest':
                $products_query->orderBy('created_at', 'desc');
                break;
            case 'cheapest':
                $products_query->select('products.*')
                    ->selectRaw('(SELECT MIN(price) FROM skus WHERE skus.product_id = products.id) as min_price')
                    ->orderBy('min_price', 'asc');
                break;
            case 'most-expensive':
                $products_query->select('products.*')
                    ->selectRaw('(SELECT MAX(price) FROM skus WHERE skus.product_id = products.id) as max_price')
                    ->orderBy('max_price', 'desc');
                break;
            case 'top':
            default:
                $products_query->orderBy('created_at', 'desc');
                break;
        }

        $products = $products_query->get();

        $products = $products->map(function ($product) {
            $sku = $product->skus->first(); // TODO: another method to choose sku
            return [
                'link' => "123123",
                'image' => $product->images->first()->path ?? '/default-image.jpg',
                'name' => $product->name,
                'category' => $product->categories->first()->name ?? 'Uncategorized',
                'price' => $sku->price ?? 0,
            ];
        });

        return view('category', compact(
            'collection',
            'categories',
            'brands',
            'colors',
            'products',
            'sort',
            'selected_category',
            'selected_brands',
            'selected_colors',
            'price_from',
            'price_to'
        ));
    }
}
