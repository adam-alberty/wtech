<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
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

        // Fetch all categories, brands, colors, and sizes for the sidebar
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();

        $selected_category = request()->query('category');
        $selected_brands = array_filter((array) request()->query('brand', []));
        $selected_colors = array_filter((array) request()->query('color', []));
        $selected_sizes = array_filter((array) request()->query('size', []));
        $price_from = request()->query('price_from');
        $price_to = request()->query('price_to');
        $sort = request()->query('sort', 'top');

        $products_query = Product::query();

        // Select only products where amount_in_stock > 0
        $products_query->whereExists(function ($query) {
            $query->select(\DB::raw(1))
                ->from('skus')
                ->whereColumn('skus.product_id', 'products.id')
                ->where('amount_in_stock', '>', 0);
        });

        if ($slug) {
            $products_query->whereHas('collections', function ($query) use ($collection) {
                $query->where('collection_id', $collection->id);
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

        // Filter by sizes
        if (!empty($selected_sizes)) {
            $products_query->whereHas('skus', function ($query) use ($selected_sizes) {
                $query->whereIn('size_id', $selected_sizes);
            });
        }

        // Filter by price
        if ($price_from && is_numeric($price_from) && $price_from >= 0) {
            $products_query->where('price', '>=', $price_from);
        }
        if ($price_to && is_numeric($price_to) && $price_to >= 0) {
            $products_query->where('price', '<=', $price_to);
        }

        // Eager load
        $products_query->with(['images', 'categories', 'brand', 'skus']);

        switch ($sort) {
            case 'newest':
                $products_query->orderBy('created_at', 'desc')
                    ->orderBy('id', 'desc');
                break;
            case 'cheapest':
                $products_query->orderBy('price', 'asc')
                    ->orderBy('id', 'desc');
                break;
            case 'most-expensive':
                $products_query->orderBy('price', 'desc')
                    ->orderBy('id', 'desc');
                break;
            case 'top':
            default:
            $products_query->join('skus', 'products.id', '=', 'skus.product_id')
                ->leftJoin('order_item', 'skus.id', '=', 'order_item.sku_id')
                ->select('products.*')
                ->selectRaw('COALESCE(SUM(order_item.quantity), 0) as total_quantity')
                ->groupBy('products.id', 'products.name', 'products.slug', 'products.created_at',
                    'products.updated_at', 'products.price', 'products.brand_id')
                ->orderBy('total_quantity', 'desc')
                ->orderBy('id', 'desc');
                break;
        }

        // Pagination: 12 products per page
        $products = $products_query->paginate(12);

        $products->appends([
            'category' => $selected_category,
            'brand' => $selected_brands,
            'color' => $selected_colors,
            'size' => $selected_sizes,
            'price_from' => $price_from,
            'price_to' => $price_to,
            'sort' => $sort,
        ]);

        $products->through(function ($product) {
            return [
                'link' => "/product/{$product->slug}",
                'image' => $product->images->first()->path ?? '/assets/default-image.png',
                'name' => $product->name,
                'category' => $product->categories->first()->name ?? 'Uncategorized',
                'price' => $product->price ?? 0,
            ];
        });

        return view('category', compact(
            'collection',
            'categories',
            'brands',
            'colors',
            'sizes',
            'products',
            'sort',
            'selected_category',
            'selected_brands',
            'selected_colors',
            'selected_sizes',
            'price_from',
            'price_to'
        ));
    }
}
